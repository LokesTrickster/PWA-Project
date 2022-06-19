<?php
include "../include/config.php";

$errorMsg = null;
$successMsg = null;

if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $hashedPassword = password_hash($password, CRYPT_BLOWFISH);

    $mysql = new mysqli($DB_HOST, $DB_USER, $DB_PW, $DB);
    $stmt = $mysql->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $username, $email, $hashedPassword);
   
    if($stmt->execute()) {
        $successMsg = 'Registered successfully!';
    }else {
        $errorMsg = 'Something went wrong';
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
        <h1>Register</h1>
        <p class="error" <?php if ($errorMsg == null) echo "hidden"; ?>><?php if ($errorMsg != null) echo $errorMsg ?></p>
        <p class="success" <?php if ($successMsg == null) echo "hidden"; ?>><?php if ($successMsg != null) echo $successMsg ?></p>
        <form action="/register" method="post">
            <label for="email">Email</label><input type="email" name="email" id="email" required>
            <label for="username">Username</label><input type="text" name="username" id="username" required>
            <label for="password">Password</label><input type="password" name="password" id="password" required>
            <div><input type="submit" value="Register"><span>Already a user? <a href="/login">Login</a></span></div>
        </form>
    </section>
    <?php
    include "../include/footer.php"
    ?>
</body>

</html>