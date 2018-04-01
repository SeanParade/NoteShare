<?php
session_start();
$noteid = $_GET['noteid'];
$groupid = $_GET['groupid'];
$noteDIR = "..".DIRECTORY_SEPARATOR."userFiles".DIRECTORY_SEPARATOR.$_SESSION["id"].DIRECTORY_SEPARATOR.$noteid;
$groupDIR="..".DIRECTORY_SEPARATOR."groupFiles".DIRECTORY_SEPARATOR.$groupid.DIRECTORY_SEPARATOR.$noteid;
copy($noteDIR.'.txt', $groupDIR.'.txt');
copy($noteDIR.'.phtml',$groupDIR.'.phtml');
header("Location: index.php");
include "include/closeDB.inc.php";


