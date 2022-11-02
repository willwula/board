<title>Delete</title>
<?php
include 'style.html';
?>
<body>
     <div class="flex-center position-ref full-height">
                <div class="top-right home">
                        <a href="view.php?name="$_GET['name']"">View</a>
                        <a href="index.php">Login</a>
                        <a href="signup.php">Register</a>
                </div>
      <div class="content">
                <div class="m-b-md">
                    <form name="login" action="delete.php" method="POST">
                        <p>ID : <input type=text name="id"></p>
                        <!-- <p>Username : <input type=text name="name"></p>
                        <p>Password : <input type=password name="password"></p> -->
                        <p><input type="submit" name="submit" value="Delete">
                    <style>
                        input {padding:5px 15px; background:#ccc; border:0 none;
                        cursor:pointer;
                        -webkit-border-radius: 5px;
                        border-radius: 5px; }
                    </style>
                        <input type="reset" name="Reset" value="Reset">
                    <style>
                        input {
                            padding:5px 15px;
                            background:#FFCCCC;
                            border:0 none;f
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px;
                            font-family: 'Nunito', sans-serif;
                            font-size: 19px;
                        }
                    </style>
                    </form>
                </div>

</body>
</html>
<?php
if (isset($_POST['submit'])) {
	require_once("db_conn.php");
    $id = $_POST['id'];
	@$name = $_POST['name'];
	@$password = $_POST['password'];
    
    $sql = "DELETE FROM user WHERE id='{$_POST['id']}'";

if ($conn->query($sql) === TRUE) {
  echo " Record deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>