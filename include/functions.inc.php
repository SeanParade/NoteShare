<?php
function sendPost ($variable)
{
    $_POST['groupName'] = $variable;

    echo isset($_POST['groupName']) ? $_POST['groupName'] : "not set";
}

?>