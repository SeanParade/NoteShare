<?php
require 'include/connectDB.php';
require_once 'parse.php';

if(!empty($_POST["noteText"])){
    $noteDIRphp = "..".DIRECTORY_SEPARATOR."userFiles".DIRECTORY_SEPARATOR.$_SESSION["id"].DIRECTORY_SEPARATOR.$_POST["t"].".txt";
    $noteDIRphtml = "..".DIRECTORY_SEPARATOR."userFiles".DIRECTORY_SEPARATOR.$_SESSION["id"].DIRECTORY_SEPARATOR.$_POST["t"].".phtml";
    $noteContentsUp=$_POST["noteText"];
    file_put_contents($noteDIRphp,$noteContentsUp);
    $parsedFile = parseFile($noteContentsUp);
    file_put_contents($noteDIRphtml,$parsedFile);

    $noteID=$_POST["t"];
    $query = "update notes set title='".$_POST["noteTitle"]."' where noteid = '$noteID'";
    $stmt = $dbCon->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_BOTH);
}

require_once 'include/closeDB.inc.php';
header("Location: index.php?cc=shownote&t=".$_POST["t"]);