<title>Edit Message</title>
<?php
include 'style.html';
$name = $_GET['name'];
$no = $_GET['no'];
?>

<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <a href='view.php?name=<?=$name?>&no=<?=$no?>'>View</a>
        <a href="index.php">Login</a>
        <a href="signup.php">Register</a>
    </div>

    <?php
    include 'db.php';
    $sql = "SELECT * FROM guestbook WHERE  no = '$no'";
    /** @var TYPE_NAME $pdo */
    $result = $pdo->prepare($sql);
    $result->execute();
    $no = $_GET['no'];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="content">
        <div class="m-b-md">
            <form name="form1" action="edit.php" method="post">
                <input type="hidden" name="no" value="<?=$row['no']?>">
                <input type="hidden" name="name" value="<?=$_GET['name']?>">
                <p>SUBJECT</p>
                <label>
                    <input type="text" name="subject" value="<?=$row['subject']?>">
                </label>
                <p>CONTENT</p>
                <label>
                    <textarea style="font-family: 'Nunito', sans-serif; font-size:20px; width:550px; height:100px;" name="content"><?=$row['content']?></textarea>
                </label>
                <p><input type="submit" name="submit" value="SAVE">
                    <style>
                        input {padding:5px 15px; background:#ccc; border:0 none;
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px; }
                    </style>
                    <input type="reset" name="Reset" value="REWRITE">
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

<?php }

if (isset($_POST['submit'])) {

    $no = $_POST['no'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $sql = "UPDATE guestbook SET subject='$subject',content='$content' where no='$no'";
    $result = $pdo->prepare($sql);
    if (!empty($result)) {
        $result->execute();
    }
    if (!$result) die(); else {
        echo "
         <script>
            setTimeout(function(){window.location.href='view.php?name=" . $name . "&no=" . $no . "';},200);
        </script>";

    }
} else {
    echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
}
?>