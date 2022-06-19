<?php
session_start();

include "../include/config.php";

$mysql = new mysqli($DB_HOST, $DB_USER, $DB_PW, $DB);
$USER_ID = $_SESSION['user_data']['id'];

function nameSet($name): bool
{
    global $mysql, $USER_ID;

    $stmt = $mysql->prepare('SELECT name FROM users WHERE id = ?');
    $stmt->bind_param('i', $USER_ID);
    $stmt->execute();

    $result_name = null;

    $stmt->bind_result($result_name);


    return !!$stmt->fetch() && $name == $result_name;
}

function lastNameSet($lastname): bool
{
    global $mysql, $USER_ID;

    $stmt = $mysql->prepare('SELECT lastname FROM users WHERE id = ?');
    $stmt->bind_param('i', $USER_ID);
    $stmt->execute();

    $result_lastname = null;

    $stmt->bind_result($result_lastname);

    return !!$stmt->fetch() && $lastname == $result_lastname;
}

function usernameSet($username): bool
{
    global $mysql, $USER_ID;

    $stmt = $mysql->prepare('SELECT username FROM users WHERE id = ?');
    $stmt->bind_param('i', $USER_ID);
    $stmt->execute();

    $result_username = null;

    $stmt->bind_result($result_username);

    return !!$stmt->fetch() && $username == $result_username;
}

function emailSet($email): bool
{
    global $mysql, $USER_ID;

    $stmt = $mysql->prepare('SELECT email FROM users WHERE id = ?');
    $stmt->bind_param('i', $USER_ID);
    $stmt->execute();

    $result_email = null;

    $stmt->bind_result($result_email);

    return !!$stmt->fetch() && $email == $result_email;
}

function passwordSet($password): bool
{
    global $mysql, $USER_ID;

    $stmt = $mysql->prepare('SELECT password FROM users WHERE id = ?');
    $stmt->bind_param('i', $USER_ID);
    $stmt->execute();

    $result_password = null;

    $stmt->bind_result($result_password);

    return !!$stmt->fetch() && password_verify($password, $result_password);
}

if (isset($_POST['name'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password'])) {
    $code = 0;
    $message = '';

    $warngings = [];

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    unset($_POST['name'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password']);

    $count = 0;

    if (nameSet($name) && strlen($name)) {
        $code = 1;
        $warnings[$count++] = "Name";
    }
    if (lastNameSet($lastname) && strlen($lastname)) {
        $code = 1;
        $warnings[$count++] = "Last name";
    }
    if (usernameSet($username) && strlen($username)) {
        $code = 1;
        $warnings[$count++] = "Username";
    }
    if (emailSet($email) && strlen($email)) {
        $code = 1;
        $warnings[$count++] = "E-mail";
    }
    if (passwordSet($password) && strlen($password)) {
        $code = 1;
        $warnings[$count++] = "Password";
    }

    if ($code == 1) {
        for ($i = 0; $i < $count; $i++) {
            $message .= $warnings[$i];

            if ($i < $count - 2)
                $message .= ', ';
            else if ($i < $count - 1)
                $message .= ' and ';
        }

        $word = $count > 1 ? 'are' : 'is';

        $message .= " $word already the same";
    } else {

        $count = 0;
        $resultCount = 0;
        $sqlArray = [];
        $resultArray = [];

        if (strlen($name)) {
            $sqlArray[$count++] = 'name=?';
            $resultArray[$resultCount++] = $name;
        }
        if (strlen($lastname)) {
            $sqlArray[$count++] = 'lastname=?';
            $resultArray[$resultCount++] = $lastname;
        }
        if (strlen($username)) {
            $sqlArray[$count++] = 'username=?';
            $resultArray[$resultCount++] = $username;
        }
        if (strlen($email)) {
            $sqlArray[$count++] = 'email=?';
            $resultArray[$resultCount++] = $email;
        }
        if (strlen($password)) {
            $sqlArray[$count++] = 'password=?';
            $resultArray[$resultCount++] = password_hash($password, CRYPT_BLOWFISH);
        }

        $sqlInsert = '';

        foreach ($sqlArray as $val) {
            $sqlInsert .= "$val, ";
        }

        if (strlen($sqlInsert)) {

            $matchArr = [];

            preg_match('/^(.*), $/', $sqlInsert, $matchArr);

            $sqlInsert = $matchArr[1];
            try {
                $sql = "UPDATE users SET $sqlInsert WHERE id=?";
                $stmt = $mysql->prepare($sql);
                $stmt->execute([...$resultArray, $USER_ID]);

                $code = 0;
            } catch (\Throwable $th) {
                echo $th->getMessage();
                $code = -1;
            }
        } else {
            $code = 2;
            $message = "Profile details unchanged";
        }

        if (!$code) {
            $message = "Update successful!";

            if (strlen($name))
                $_SESSION['user_data']['name'] = $name;
            if (strlen($lastname))
                $_SESSION['user_data']['lastname'] = $lastname;
            if (strlen($username))
                $_SESSION['user_data']['username'] = $username;
            if (strlen($email))
                $_SESSION['user_data']['email'] = $email;
            if(strlen($password))
                $_SESSION['user_data']['pw_length'] = strlen($password);
        } else if ($code == -1)
            $message = "Something went wrong!";
    }

    echo '{"code": ' . $code . ',"message": "' . $message . '"}';
} else {
    echo 'INVALID REQUEST!';
}
