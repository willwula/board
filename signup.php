<title>Sign up</title>
<?php
include 'style.html';
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <a href="view.php">View</a>
        <a href="index.php">Login</a>
        <a href="signup.php">Register</a>
    </div>
    <div class="content">
        <div class="m-b-md">
            <form name="signup" action="signup.php" method="post">
                <p>Username : <label>
                        <input type=text name="name">
                    </label></p>
                <p>Password : <label>
                        <input type=password name="password">
                    </label></p>
                <p><input type="submit" name="submit" value="Sign up">
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
                            border:0 none;
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
<!--按下Signup後接著會執行以下程式碼-->
<?php
header("Content-Type: text/html; charset=utf8");
if (isset($_POST['submit'])) {
    include "db.php";
    $name = $_POST['name'];
    $password = $_POST['password'];
    if ($name && $password) {
        $sql = "SELECT * from user where name = '$name'";
        $result = $pdo->prepare($sql);
        $result->execute();
        $rows = $result->rowCount();
        if (!$rows) { //若這個username還未被使用過
            $sql = "INSERT INTO user(id,name,password) values (null,'$name','$password')";
            $data = ["$name","$password"];
            $result = $pdo->prepare($sql);
            try {
                if ($result->execute()) {
                    echo '新增成功';
                    echo "
                    <script>
                    setTimeout(function(){window.location.href='index.php';},3000);
                    </script>";
                } else {
                    echo '新增失敗';
                    echo "
                <script>
                setTimeout(function(){window.location.href='signup.php';},1000);
                </script>";
                }
            } catch (PDOException $e) {
                echo '新增失敗';
            }
        } else { //這個username已被使用

            echo '<div class="warning">The Username has already been used ！</div>';
            echo "
                <script>
                setTimeout(function(){window.location.href='signup.php';},1000);
                </script>";
        }
    } else {

        echo '<div class="warning">Incompleted form！ </div>';
        echo "
                <script>
                setTimeout(function(){window.location.href='signup.php';},1000);
                </script>";
    }
}

unset($pdo);
?>
