<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 2016-11-15
 * Time: 2:14 PM
 */

//1. connect to DB

 $dbCon = new mysqli('localhost', 'f6team25_mainuse', 'dylansean', 'f6team25_main');
//2. validation
    if ($dbCon->connect_errno)
    {
        die("Cannot connect to database" . $dbCon->connect_error);
    }





//3. query prep
   // $query = 'SELECT * FROM users';
   // echo $query;
//4. query exec
  // $result = $dbCon->query($query);
    // var_dump($result);
  //  echo $result->num_rows;

//5. manage info
   // var_dump($result->fetch_assoc());

/* while ($row = $result->fetch_assoc())
{
    echo "Name: ".$row['firstName']. "Last Name: ".$row['lastName'];
}

    $result->free();
    $db_con->close();

*/

?>