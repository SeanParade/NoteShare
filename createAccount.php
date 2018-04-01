<?php
require_once 'include/connectDB.php';
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

class User
{
    public function __construct($userName, $firstName, $lastName, $email, $password)
    {
        $this->userID = substr(base64_encode(sha1(mt_rand())), 0, 9);
        $this->userName = $userName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->fullName = $firstName . " " . $lastName;
        $this->email = $email;
        $this->password = $password;
    }

}



if (strcmp($password, $repassword) == 0 ) {
    $password = md5($password);
    $newUser = new User ($username, $firstName, $lastName, $email, $password);
    //Make a Directory under the name of their userID
    if (!is_dir("../userFiles/".$newUser->userID)){
        $path="../userFiles/$newUser->userID";
        mkdir($path, 0700, true);
    }
 //   $query = "INSERT INTO users (id, username, email, firstName, lastName, password) VALUES
// ('$newUser->userID','$newUser->userName', ' $newUser->firstName', '$newUser->lastName', '$newUser->email', '$newUser->password')";
$stmt = $dbCon->prepare("INSERT INTO users (id, username, email, firstName, lastName, password) VALUES (:userID, :userName, :firstName, :lastName, :email, :password)");
    $stmt->bindParam(':userID', $newUser->userID);
    $stmt->bindParam(':userName', $newUser->userName);
    $stmt->bindParam(':firstName', $newUser->firstName);
    $stmt->bindParam(':lastName', $newUser->lastName);
    $stmt->bindParam(':email', $newUser->email);
    $stmt->bindParam(':password', $newUser->password);
    $stmt->execute();


    header('Location: login.php');
}
else {
    header('Location: register.php?msg=Passwords do not match');
}
include_once 'include/closeDB.inc.php';



