<?php
require_once("db_conn.php");
// $servername = "127.0.0.1";
// $username = "root";
// $password = "1111";
// $dbname = "board";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

$sql = "INSERT INTO user (name, password)
VALUES ('ian', 'ian')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>