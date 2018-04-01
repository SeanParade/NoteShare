<?php
session_start();
include "include/connectDB.php";
$tag = $_GET['tag'];
$stmt=$dbCon->prepare("SELECT noteid, title from notes WHERE  tags LIKE '%$tag%'");
$stmt->execute();
$arrayNotes = [];
$i = 0;
while ($tags=$stmt->fetch(PDO::FETCH_ASSOC)) {
        $arrayNotes[$i] = $tags;
        $i++;
}
$j=0;
$k=0;
while($j<count($arrayNotes)){
        echo "<a href=\"?cc=shownote&pt=Note Share&f=&t=".$arrayNotes[$j]['noteid']."\">"."<div class=' white-text col s12 m6 l2 center-align' style='margin-top:3%' ><div class='cyan truncate' style='height:150px'><i class=\"material-icons center-align\"><h1 style='font-size:3em;margin-top:-10%;margin-bottom:-10%'>subject</h1></i><br/>" . $arrayNotes[$j]["title"] . "</div></div></a>";
                $j++;
}

include "include/closeDB.inc.php";

?>


