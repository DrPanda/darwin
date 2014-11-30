#!/usr/bin/php
<?php
// test.php for  in /Users/Panda
// 
// Made by PRAK Denis
// Login   <prak_a@etna-alternance.net>
// 
// Started on  Tue Nov 25 17:26:37 2014 PRAK Denis
// Last update Sun Nov 30 23:14:09 2014 VANDISTE William
//

$servername = "localhost:8888";
$username = "root";
$password = "root";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO student (id, lastname, firstname)
VALUES ('12333', 'Doeee', 'johnee')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

/* $sql1 = "SHOW TABLES FROM $dbname"; */
/* $result = mysql_query($conn,  */
var_dump(mysqli_query($conn, $sql));
mysqli_close($conn);
?>