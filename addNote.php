<?php $_GET["pt"] = "New Note";
$d=strtotime("now");
date_default_timezone_set("EST");
?>
    <form action="submitTextNote.php" class="valign" style="margin-top:5%" method="POST">
        <div class="noteHeader ">
            <span class="blue-text right">Created: <?=date("M/d Y",$d)." - ".date("h:ia",$d)?></span>

            <input type="text" class="" name="noteTitle" placeholder="Add a Title" id="noteTitleField" required>
        </div>
        <div class="noteArea ">
            <textarea name="noteText" class="materialize-textarea " placeholder="Enter Your Note Here" id="noteTextField"></textarea>
            <input type="text" name="dateCreated" value="<?=date($d)?>" hidden>
            <input type="text" name="tags" style="width:20%" class="tooltipped" placeholder="Tags for Organization" data-position="right" data-delay="50" data-tooltip="You can add multiple tags. Just separate them with a comma!">
            <button type="submit" id="submitButton" class="btn-floating btn-large red right">+</button>
    </form>
