<?php
session_start();
require_once "include/Parsedown.php";

function parseFile ($file) {
    $Parsedown = new Parsedown();
    $text = $Parsedown->text($file);
    return $text;
}

?>