<title>All messages</title>
<?php
include 'style.html';
$name = $_GET['name'];
?>
<body>
	<div class="flex-center position-ref full-height">
	<div class="top-right home">
    <?php
    if (!$name) {
	    echo '<a href="index.php">Log in</a>';
    } else {
        echo "<a href='view.php?name=" . $name . "'>View</a>";
	    echo "<a href='board.php?name=" . $name . "'>Write some messages</a>";
	    echo '<a href="index.php">Log out</a>';
    }?>
    </div>
    </div>
<div class="note full-height">
    <?php
    session_start();
    include "db.php";
    $sql = "SELECT * from guestbook";
    /** @var TYPE_NAME $pdo */
    $result = $pdo->prepare($sql);
    $result->execute();
    // var_dump($result);
    $_SESSION['name'] = $name = $_GET['name'];
//從資料庫中撈留言紀錄並顯示出來
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	    echo "<br>Visitor Name：" . $row['name'];
	    echo "<br>Subject：" . $row['subject'];
	    echo "<br>Content：" . nl2br($row['content']) . "<br>";
	    if ($name == $row['name']) {  //若登入者名稱和留言者名稱一致，顯示出編輯和刪除的連結
		    echo '<a href=" edit.php?no=' . $row['no'] . '&name=' . $name . '">
		Edit message content</a>&nbsp|&nbsp<a href="delete.php?no=' . $row['no'] . '">Delete the message</a><br>';
	}
	    echo "Time：" . $row['time'] . "<br>";
	    echo "<hr>";

    }
    echo "<br>";
    echo '<div class="bottom left position-abs content">';
    echo "There are " . $result->rowCount() . " messages.";
    ?>
</div>
</body>