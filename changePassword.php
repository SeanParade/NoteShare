<?php
session_start();
include "include/connectDB.php";
$userid = $_SESSION['id'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$newpass = $_POST['newpass'];
if(strcmp($pass1, $pass2) == 0) {
    $newpass = md5($newpass);
    $stmt = $dbCon->prepare("UPDATE users SET password = '$newpass' WHERE id='$userid'");
    $stmt->execute();
}
else {
    header("Location: ");
}

include "include/closeDB.inc.php";