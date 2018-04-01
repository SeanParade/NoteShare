<?php
$dsn = 'mysql:host=localhost;dbname=f6team25_main';
$user = 'f6team25_mainuse';
$pass= 'dylansean';
try {
$dbCon = new PDO($dsn, $user,$pass);

} catch (Exception $ex)
{

}
