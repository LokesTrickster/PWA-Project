<?php
session_start();

include "../include/config.php";

if (isset($_SESSION['user_data']))
    header('Location: /');

$errorMsg = null;

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $mysql = new mysqli($DB_HOST, $DB_USER, $DB_PW, $DB);
    $stmt = $mysql->prepare('SELECT id, name, lastname, username, password FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();

    $id;
    $name;
    $lastname;
    $username;
    $hashedPassword;

    $stmt->bind_result($id, $name, $lastname, $username, $hashedPassword);
    if (!!$stmt->fetch() && password_verify($password, $hashedPassword)) {
        setcookie(
            'user_data',
            json_encode(array('email' => $email, 'password' => $hashedPassword, 'pw_length' => strlen($password))),
            time() + 60 * 60 * 24 * 30
        );
        $_SESSION['user_data'] = array('id' => $id, 'name' => $name, 'lastname' => $lastname, 'email' => $email, 'username' => $username, 'pw_length' => strlen($password));
        header('Location: /');
    } else {
        $errorMsg = 'Username or password is invalid';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../include/head.php" ?>
    <link rel="stylesheet" href="/styles/loginRegister.css">
</head>

<body>
    <?php
    include "../include/navigation_bar.php"
    ?>
    <section>
        <h1>Login</h1>
        <p class="error" <?php if ($errorMsg == null) echo "hidden"; ?>><?php if ($errorMsg != null) echo $errorMsg ?></p>
        <form action="/login" method="post">
            <label for="email">Username (email)</label><input type="text" name="email" id="email" required>
            <label for="password">Password</label><input type="password" name="password" id="password" required>
            <div><input type="submit" value="Login"><span>Not already a user? <a href="/register">Register</a></span></div>
        </form>
    </section>
    <?php
    include "../include/footer.php"
    ?>
</body>

</html>