<?
session_start();
session_destroy();
header("Location: login.php");
echo '<a class="showSource" href="/view_folder/vs.php?s=<?php echo __FILE__?>" target="_blank" hidden>View Source</a>';
