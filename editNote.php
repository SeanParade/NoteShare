<?php
require 'include/connectDB.php';
require_once 'parse.php';

$noteID=$_GET["t"];
$query = "select title from notes where noteid = '$noteID'";
$stmt = $dbCon->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_BOTH);

try{
if(!empty($_GET["t"])){
$noteDIRphp = "..".DIRECTORY_SEPARATOR."userFiles".DIRECTORY_SEPARATOR.$_SESSION["id"].DIRECTORY_SEPARATOR.$_GET["t"].".txt";
$noteDIRphtml = "..".DIRECTORY_SEPARATOR."userFiles".DIRECTORY_SEPARATOR.$_SESSION["id"].DIRECTORY_SEPARATOR.$_GET["t"].".phtml";
$noteContents = @file_get_contents($noteDIRphp);
}}
catch (Exception $e){
    echo "Sorry, something bad happened. Try that again.";

}
require_once 'include/closeDB.inc.php';
?>

<form action="updateNote.php" class="valign" style="margin-top:5%" method="POST">
    <div class="noteHeader ">

        <input type="text" class="" name="noteTitle" value="<?echo $result[0];?>" id="noteTitleField" required>
    </div>
    <div class="noteArea ">
        <textarea name="noteText" class="materialize-textarea"  id="noteTextField"><?php echo $noteContents?></textarea>
        <input type="text" name="tags" style="width:20%" class="tooltipped truncate" placeholder="Tags for Organization" data-position="right" data-delay="50" data-tooltip="You can add multiple tags. Just separate them with a comma!">
        <input type="text" name="t" value="<?=$_GET['t']?>" hidden>

        <button type="submit" id="submitButton" class="btn-floating btn-large red right">+</button>
</form>

