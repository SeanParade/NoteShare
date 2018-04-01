<?
$groupID = $_SESSION["currentGroup"];

echo "<div class='markdown-body'>";
if ($_GET["f"]=="group"){
    $noteDIR = "..".DIRECTORY_SEPARATOR."groupFiles".DIRECTORY_SEPARATOR.$groupID.DIRECTORY_SEPARATOR.$_GET["t"].".phtml";
}
else {
    $noteDIR = ".." . DIRECTORY_SEPARATOR . "userFiles" . DIRECTORY_SEPARATOR . $_SESSION["id"] . DIRECTORY_SEPARATOR . $_GET["t"] . ".phtml";
}

echo file_get_contents($noteDIR);
echo "<a class=\"btn-floating blue tooltipped\" data-position=\"right\" data-delay=\"50\" data-tooltip=\"Edit This Note\" style='position:fixed;top:10%;left:85%;' href=\"?cc=editnote&pt=Edit Note&t=".$_GET["t"]."\" class=\"col s2 \"><i class=\"material-icons\">subject</i></a>";
echo "<a class=\"btn-floating red tooltipped\" data-position=\"right\" data-delay=\"50\" data-tooltip=\"Delete This Note\" style='position:fixed;top:20%;left:85%;' href=\"deleteNote.php?t=".$_GET["t"]."\" class=\"col s2 \"><i class=\"material-icons\">delete</i></a>";
echo "<a class=\"btn-floating dropdown-button yellow darken-2 tooltipped\" data-activates=\"dropdownShare\" data-position=\"right\" data-delay=\"50\" data-tooltip=\"Share This Note\" style='position:fixed;top:30%;left:85%;' href=\"#!\" class=\"col s6 \"><i class=\"material-icons\">swap_horiz</i></a>";
?>
    <ul id="dropdownShare" style="width:700px" class="navControl dropdown-content row collection yellow darken-2 no-padding dropdown-content" style="margin-top: 27%">
        <?php
        for ($i = 0; $i<count($groups); $i++){
            echo "<li style='margin:20px'><a class='no-padding yellow darken-2 col s12 white-text collection-item' href=\"addNoteToGroup.php?noteid=".$_GET['t']."&groupid=".$groups[$i]->groupid."\">".$groups[$i]->groupName."</a></li>";}
        ?>
    </ul>


<?php
echo "</div>";

