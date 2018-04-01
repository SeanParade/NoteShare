<?php
$content = isset($_GET["cc"])? $_GET["cc"] : null;
$contentRequested="";

switch ($content){
    case "addnote":
        $contentRequested = "addNote.php";
        break;
    case "addgroup":
        $contentRequested = "addGroup.php";
        break;
    case "editgroup":
        $contentRequested = "editGroup.php";
        break;
    case "uploadnote":
        $contentRequested = "uploadNote.php";
        break;
    case "shownote":
        $contentRequested = "showNote.php";
        break;
    case "editnote":
        $contentRequested = "editNote.php";
        break;
    case "tagspage":
        $contentRequested = "findTags.php";
        break;
    default:
        $contentRequested = "tutorial.phtml";
        break;
}

include_once($contentRequested);

