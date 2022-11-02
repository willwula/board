<!DOCTYPE html>
<title>Select</title>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<?php
include 'style.html';
?>

<?php
	require_once("db_conn.php");
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Password</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["id"] ."<td>" .$row["name"] ."<td>" .$row["password"] ."<tr>";
    }
    echo "</table>";
    echo "All record printed successfully";
} else {
  echo "0 results";
}

$conn->close();
?>

</body>
</html>