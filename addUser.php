<?php
session_start();
require_once "include/connectDB.php";
$userid = $_SESSION['id'];
$group = $_SESSION['selectedGroup'];
$newUsername = $_POST['addMember'];
$stmt=$dbCon->prepare("SELECT * from groups WHERE groupid = '$group' AND userid = '$userid'");
$stmt->execute();
$groupResult = $stmt->fetch(PDO::FETCH_BOTH);
$stmt= $dbCon->prepare("SELECT * from users WHERE username = '$newUsername' ");
$stmt->execute();
$userResult = $stmt->fetch(PDO::FETCH_BOTH);
if (strcmp($group, $groupResult['groupid'])== 0 && strcmp($newUsername, $userResult['username'])==0 ) {
    $stmt = $dbCon->prepare("INSERT into groups (userid, name, groupid) VALUES (:userid, :name,:groupid)");
    $stmt->bindParam(':userid', $userResult['id']);
    $stmt->bindParam(':name', $groupResult['name']);
    $stmt->bindParam(':groupid', $groupResult['groupid']);
    $stmt->execute();
    header("Location: index.php");
}
else {
echo "Something is broken";
}
require_once "include/closeDB.inc.php";


