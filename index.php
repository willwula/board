<title>Login</title>
<?php
include 'style.html';
?>
<body>
     <!-- <div class="flex-center position-ref full-height">
                <div class="top-right home">
                        <a href="view.php?name="$_GET['name']"">View</a>
                        <a href="index.php">Login</a>
                        <a href="signup.php">Register</a>
                </div> -->
      <div class="content">
                <div class="m-b-md">
                    <form name="login" action="index.php" method="POST">
                        <p>Username : <input type=text name="name"></p>
                        <p>Password : <input type=password name="password"></p>
                        <p><input type="submit" name="submit" value="輸入">
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
// header("Content-Type: text/html; charset=utf8");
if (isset($_POST['submit'])) {
	require_once("db_conn.php");
	$name = $_POST['name'];
	$password = $_POST['password'];
    
	if ($name && $password) {
		$sql = "SELECT * FROM user WHERE `name` = '$name' and `password`='$password'";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($result);
		if ($rows) {
			echo '<div class="success">welcome！ </div>';
			//echo "
			// <script>
			// setTimeout(function(){window.location.href='view.php?name=" . $name . "';},600);
			// </script>";
			exit;
		} else {
			echo '<div class="warning">Wrong Username or Password！</div>';
		}
	} else {

		echo '<div class="warning">未完成輸入！ </div>';
		echo "
<script>
setTimeout(function(){window.location.href='login.php';},2000);
</script>";
	}
	mysqli_close($conn);

}
?>