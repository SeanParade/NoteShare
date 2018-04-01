<?php
session_start();
require_once 'include/connectDB.php';
$groupName = $_POST['groupName'];
$userID = $_SESSION['id'];

class Group {
    public function __construct($groupName, $userID)
    {
        $this->groupID = substr(base64_encode(sha1(mt_rand())), 0, 9);
        $this->userid = $userID;
        $this->groupName = $groupName;

    }
}
$newGroup = new Group ($groupName, $userID);
$stmt = $dbCon->prepare("INSERT into groups (userid, groupid, name) VALUES (:userid, :groupid, :groupname)");
$stmt->bindParam(':userid', $newGroup->userid );
$stmt->bindParam(':groupid', $newGroup->groupID );
$stmt->bindParam(':groupname', $newGroup->groupName );


if (!is_dir("../groupFiles/".$newGroup->groupID)){
    $path="../groupFiles/$newGroup->groupID";
    mkdir($path, 0700, true);
}
$stmt->execute();
header("Location: index.php");

require_once 'include/closeDB.inc.php';

