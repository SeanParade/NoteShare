<?php
require_once 'include/connectDB.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE username = '$username' ";

$stmt = $dbCon->prepare($query);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_BOTH);


$md5pass = md5($password);

if ($md5pass == $result['password']) {
    $_SESSION['username'] = $result['username'];
    $_SESSION['id'] = $result['id'];
    header('Location: index.php');
}
else {
    header("Location: login.php?msg=Your username or password is incorrect");

}


include_once 'include/closeDB.inc.php';
echo '<a class="showSource" href="/view_folder/vs.php?s=<?php echo __FILE__?>" target="_blank" hidden>View Source</a>';
