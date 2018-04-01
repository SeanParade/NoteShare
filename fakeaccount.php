<?php
/**
 * Created by PhpStorm.
 * User: Sean
 * Date: 2016-11-13
 * Time: 5:18 PM
 */

class User{
    public function __construct($userName, $firstName, $lastName, $email, $password){
        $this-> userID = substr(base64_encode(sha1(mt_rand())), 0, 9);
        $this-> userName = $userName;
        $this-> firstName = $firstName;
        $this-> lastName = $lastName;
        $this-> fullName = $firstName . " " . $lastName;
        $this-> email = $email;
        $this-> password = $password;
    }


}
$newUser = new User("seanparade","Sean","Price","ahhhh987@myself.com","lamepassword");
