<?
session_start();
require_once 'include/connectDB.php';

class Note {
    public function __construct($userid='', $noteid = '', $noteTitle = '', $noteText = '')
    {
        $this->userid = $userid;
        $this->noteid = $noteid;
        $this->noteTitle = $noteTitle;
        $this->noteText = $noteText;
    }

}
class Group {
    public function __construct($userid='', $groupid='', $groupName='') {
        $this->userid = $userid;
        $this->groupid = $groupid;
        $this->groupName = $groupName;

    }

}
$userid = $_SESSION['id'];
$query = "SELECT * from notes WHERE userid = '$userid'";
//$result = $dbCon->query($query);
$stmt = $dbCon->prepare($query);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH))
{
    $notes[] = new Note($userid, $row['noteid'], $row['title'], $row['text'] );
}
$query = "SELECT * from groups WHERE userid = '$userid'";
$stmt = $dbCon->prepare($query);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH))
{
    $groups[] = new Group($userid, $row['groupid'], $row['name']);
}
if (!empty($groups)) {
    $groupsunique = (array_unique($groups, SORT_REGULAR));
    $groups = array_values($groupsunique);
}
require_once 'include/closeDB.inc.php';

echo '<a class="showSource" href="/view_folder/vs.php?s=<?php echo __FILE__?>" target="_blank" hidden>View Source</a>';
