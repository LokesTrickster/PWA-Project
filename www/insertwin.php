<?php
include "../include/config.php";

session_start();

$mysql = new mysqli($DB_HOST, $DB_USER, $DB_PW, $DB);

if(isset($_POST['difficulty'])) {
    $difficulty = $_POST['difficulty'];
    $timeElapsed = $_POST['timeElapsed'];

    $id = $_SESSION['user_data']['id'];

    $stmt = $mysql->prepare('INSERT INTO gameresults (user_id, gametime, difficulty) VALUES (?,?,?)');
    $stmt->bind_param('iss', $id, $timeElapsed, $difficulty);
    $stmt->execute();
}
