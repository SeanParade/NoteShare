<?php
session_start();
require_once 'include/connectDB.php';
require_once 'parse.php';
$noteTitle = $_POST['noteTitle'];
$noteText = $_POST['noteText'];
$noteTags = $_POST['tags'];

class createNote {
    public function __construct($noteTitle, $noteText, $noteTags)
    {
        $this->userid = $_SESSION['id'];
        $this->noteid = substr(base64_encode(sha1(mt_rand())), 0, 9);
        $this->noteTitle = $noteTitle;
        $this->noteText = $noteText;
        $this->noteTags = $noteTags;

    }
}
$newNote = new createNote($noteTitle, $noteText, $noteTags);
$stmt = $dbCon->prepare("INSERT INTO notes (userid, noteid, title, tags) VALUES (:userid, :noteid, :noteTitle, :noteTags)");
$stmt->bindParam(':userid', $newNote->userid);
$stmt->bindParam(':noteid', $newNote->noteid);
$stmt->bindParam(':noteTitle', $newNote->noteTitle);
$stmt->bindParam(':noteTags', $newNote->noteTags);
file_put_contents("../userFiles/".$newNote->userid."/".$newNote->noteid.".txt", $newNote->noteText);
$parsedFile = parseFile($newNote->noteText);
file_put_contents("../userFiles/".$newNote->userid."/".$newNote->noteid.".phtml", $parsedFile);
$stmt->execute();



header("Location: index.php");

include_once "populateNav.php";
require_once 'include/closeDB.inc.php';

