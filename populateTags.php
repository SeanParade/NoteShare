<?php
session_start();
include "include/connectDB.php";

$tagsSplit = [];
$userid = $_SESSION['id'];
$group = $_SESSION['selectedGroup'];
$stmt=$dbCon->prepare("SELECT tags from notes WHERE tags !='' AND userid = '$userid'");
$stmt->execute();
$i = 0;
$uniqueTags = [];
while ($tags = $stmt->fetch(PDO::FETCH_COLUMN))
{
    $uniqueTags[$i] = explode(',',$tags);
    $i++;
     }
$uniqueTags = @call_user_func_array('array_merge', $uniqueTags);
$uniqueTags= @array_unique($uniqueTags);
for ($i = 0; $i<count($uniqueTags); $i++)
{
    $uniqueTags[$i]=trim($uniqueTags[$i],' ');
}

