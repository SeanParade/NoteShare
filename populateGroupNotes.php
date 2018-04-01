<?php
include "include/connectDB.php";
$_SESSION["currentGroup"] = $groupID = $_GET["groupID"];
$dir = "..".DIRECTORY_SEPARATOR."groupFiles".DIRECTORY_SEPARATOR.$groupID.DIRECTORY_SEPARATOR;

$groupNoteIDs = [];
// Open a directory, and read its contents
if (is_dir($dir)){
    if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
            $note = new SplFileInfo($dir.$file);
            if($note->getExtension()!=="phtml" && is_file($note)) {
                array_push($groupNoteIDs,$note->getBasename(".txt"));
            }
        }
        closedir($dh);
    }
}
$j = 0;
while ($j < count($groupNoteIDs)) {
    $stmt = $dbCon->prepare("SELECT title FROM notes WHERE noteid = '$groupNoteIDs[$j]'");
    $stmt->execute();
    $noteNames[]=($stmt->fetch(PDO::FETCH_COLUMN));
    $j++;
}

for ($i = 0; $i<count($noteNames); $i++){
    echo "<a href=\"?cc=shownote&pt=Note Share&f=group&t=".$groupNoteIDs[$i]. "\">"."<div class=' white-text col s12 m6 l2 center-align' style='margin-top:3%' ><div class='cyan truncate' style='height:150px'><i class=\"material-icons center-align\"><h1 style='font-size:3em;margin-top:-10%;margin-bottom:-10%'>subject</h1></i><br/>" . $noteNames[$i] . "</div></div></a>";}


echo '<a class="showSource" href="/view_folder/vs.php?s=<?php echo __FILE__?>" target="_blank" hidden>View Source</a>';
