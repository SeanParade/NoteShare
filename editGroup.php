<?php
session_start();
include "include/connectDB.php";
$userid = $_SESSION['id'];
$stmt = $dbCon->prepare("SELECT * from groups WHERE userid = '$userid'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH))
{
    $groups[] = new Group($userid, $row['groupid'], $row['name']);
}
$_SESSION['selectedGroup'] = $_GET['groupID'];

?>



<ul class="tabs tabs-fixed-width cyan z-depth-1">
    <li class="tab "><a href="#test1" class="active white-text">Notes</a></li>
    <li class="tab"><a class=" white-text" href="#test2">Members</a></li>

    <div class="indicator" style="right: 562.719px; left: 171.281px;"></div></ul>

<div id="test1" class="col s12" >
    <?php include_once "populateGroupNotes.php"?>
</div>

<div id="test2" class="col s12" style="display: none;">
    <?php include_once "populateUsers.php";?>

    <form action="addUser.php" method='post' style="width:25%; margin-right:5%;" class="right">
        <label for="addMember">Add&nbsp; Member</label><br>
        <input type="text" name="addMember" maxlength="25" placeholder="Please Enter Username" required>
        <button type="submit" class="btn-floating right red">+</button>
    </form>
</div>

