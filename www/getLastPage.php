<?php
include "../include/config.php";
$mysql = new mysqli($DB_HOST, $DB_USER, $DB_PW, $DB);

$diff = $_REQUEST['diff'];

$stmt = $mysql->prepare(
    'SELECT COUNT(DISTINCT user_id, difficulty) FROM gameresults
        WHERE difficulty LIKE ?'
);

$stmt->bind_param('s', $diff);
$stmt->execute();

$pageCount;

$stmt->bind_result($pageCount);

$stmt->fetch();

echo $pageCount;