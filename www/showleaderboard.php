<?php
include "../include/config.php";
$mysql = new mysqli($DB_HOST, $DB_USER, $DB_PW, $DB);

$stmt = $mysql->prepare(
'SELECT DISTINCT username, MIN(gametime), difficulty FROM gameresults
    JOIN users ON users.id = gameresults.user_id
WHERE difficulty LIKE ?
    GROUP BY difficulty
    ORDER BY FIELD(difficulty, "HARD", "NORMAL", "EASY"), gametime ASC
LIMIT ?,?'
);

$pageNum = $_REQUEST['page'];
$diffValue = $_REQUEST['val'];
$pageStart = $pageNum * 10;
$pageEnd = $pageNum * 10 + 10;
$stmt->bind_param('sdd', $diffValue, $pageStart, $pageEnd);
$stmt->execute();

$username;
$time;
$difficulty;

$stmt->bind_result($username, $time, $difficulty);

$rank = 0;
$prevTime = $time;
$prevDifficulty = $difficulty;

echo "<div class=\"leaderboard\" id=\"replace\">
  <table width=\"100%\">
     <thead>
         <colgroup>
             <col>
             <col>
             <col>
             <col>
         </colgroup>
     </thead>
     <tbody>
         <tr>
             <th>Rank</th>
             <th>Username</th>
             <th>Time</th>
             <th>Difficulty</th>
         </tr>";
while ($stmt->fetch()) {
    if (($prevTime != $time) || ($prevDifficulty != $difficulty))
        $rank++;
    echo "<tr>
            <td>" . $rank . "</td>
            <td>" . $username . "</td>
            <td>" . $time . "</td>
            <td>" . $difficulty . "</td>
         </tr>";
    $prevTime = $time;
    $prevDifficulty = $difficulty;
}
echo "</tbody>
 </table>
</div>";
