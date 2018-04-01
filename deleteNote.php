<?php
session_start();
require_once 'include/connectDB.inc.php';
$noteID = $_GET["t"];

$query = "DELETE FROM notes WHERE noteid = '$noteID'";
$stmt = $dbCon->prepare($query);
$stmt->execute();

if ($_GET["f"]=="group") {
    $noteDIRphtml = ".." . DIRECTORY_SEPARATOR . "groupFiles" . DIRECTORY_SEPARATOR . $groupID . DIRECTORY_SEPARATOR . $noteID . ".phtml";
    $noteDIRmd = ".." . DIRECTORY_SEPARATOR . "groupFiles" . DIRECTORY_SEPARATOR . $groupID . DIRECTORY_SEPARATOR . $noteID . ".txt";
}
else{
    $noteDIRphtml = ".." . DIRECTORY_SEPARATOR . "userFiles" . DIRECTORY_SEPARATOR . $_SESSION["id"] . DIRECTORY_SEPARATOR . $noteID . ".phtml";
    $noteDIRmd = ".." . DIRECTORY_SEPARATOR . "userFiles" . DIRECTORY_SEPARATOR . $_SESSION["id"] . DIRECTORY_SEPARATOR . $noteID . ".txt";
    }

unlink($noteDIRphtml);
unlink($noteDIRmd);
require_once 'include/closeDB.inc.php';
header("Location: index.php?msg=Hi There");

