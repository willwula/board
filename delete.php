<?php
include "db.php";
session_start();
$no = $_GET['no'];
$sql = "DELETE from guestbook where no='$no'";
$name = $_SESSION['name'];
/** @var TYPE_NAME $pdo */
$result = $pdo->prepare($sql);
$result->execute();
if (!$result) {
    die();
} else {
    echo "
         <script>
            setTimeout(function(){window.location.href='view.php?name=" . $name . "&no=" . $no . "';},300);
        </script>";

}


