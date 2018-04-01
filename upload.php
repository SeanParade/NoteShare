<?php
session_start();
require 'include/connectDB.php';
require_once "parse.php";
$dsn = 'mysql:host=localhost;dbname=f6team25_main';
$user = 'f6team25_mainuse';
$pass= 'dylansean';
    $dbCon = new PDO($dsn, $user,$pass);
$user = $_SESSION['id'];
$uploadID = substr(base64_encode(sha1(mt_rand())), 0, 9);
$originalTitle = $_FILES['fileToUpload']['name'];
$title = explode('.md', $originalTitle);
$title = $title[0];
$noteDIR = "..".DIRECTORY_SEPARATOR."userFiles".DIRECTORY_SEPARATOR.$_SESSION["id"].DIRECTORY_SEPARATOR;
$target_file = $noteDIR . basename($uploadID.'.txt');
$target_file_phtml = $noteDIR . basename($uploadID.'.phtml');
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
   if ($imageFileType !='md') {
       echo "We dont allow this file type";
       $uploadOk = 0;
   }
else {
       $uploadOk = 1;
}
}

if (file_exists($target_file)){
    echo "This file exists already";
    $uploadOk=0;
}
if ($_FILES['fileToUpload']['size'] > 500000) {
    echo "Sorry your file is too large";
    $uploadOk=0;
}
if ($uploadOk==0){
    echo "Sorry file was not uploaded";
}
else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {

        //copy($noteDIR . basename($uploadID.'.txt'), $noteDIR . basename($uploadID.'.phtml'));
        $stmt = $dbCon->prepare("INSERT INTO notes (userid, noteid, title) VALUES (:userid, :noteid, :title)");
        $stmt->bindParam(':userid', $user );
        $stmt->bindParam(':noteid', $uploadID);
        $stmt->bindParam(':title', $title);
        $stmt->execute();
        $fileToParse = file_get_contents($noteDIR.$uploadID.'.txt');
        $parsedFile = parseFile($fileToParse);
        file_put_contents( $noteDIR . basename($uploadID.'.phtml'),$parsedFile );
        header("Location: index.php");
    }
    else {
        echo "sorry there was a problem uploading your file";
    }
}
include_once "include/closeDB.inc.php";

