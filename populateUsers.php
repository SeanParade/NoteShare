<?php
session_start();
include "include/connectDB.php";
$userid = $_SESSION['id'];
$group = $_SESSION['selectedGroup'];
//$stmt=$dbCon->prepare("SELECT groupid from groups WHERE name = '$group' AND userid = '$userid'");
//$stmt->execute();
//$result = $stmt->fetch(PDO::FETCH_BOTH);
$i = 0;
$stmt=$dbCon->prepare("SELECT userid FROM groups WHERE groupid = '$group' ");
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    $id[$i] = $row['userid'];
    $i++;
}
$j = 0;
while ($j < count($id)) {
   $stmt = $dbCon->prepare("SELECT username FROM users WHERE id = '$id[$j]'");
    $stmt->execute();
    $users[]=($stmt->fetch(PDO::FETCH_COLUMN));
    $j++;
}
$uniqueUsers = array_unique($users);
?>
    <table>
        <thead>
        <tr>
            <th data-field="id">Group Members</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $i=0;
        while ( $i<count($uniqueUsers)){
            echo "<tr><td>".$uniqueUsers[$i]."</tr></td>";
            $i++;
        }
        ?>
        </tbody>
    </table>
<?php

include "include/closeDB.inc.php";

