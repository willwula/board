<?php
// class database
// {
//     private $hostName = '127.0.0.1';
//     private $dbName = 'homework0101';
//     private $userName = 'root';
//     private $password = 'hell';
//     private $options = [
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //顯示例外處理
//         PDO::ATTR_EMULATE_PREPARES => false //SQL Injection防範
//     ];
//     private $pdo;

//     public function __construct()
//     {
//         try {
//             $this->pdo = new PDO(
//                 'mysql:host=' . $this->hostName . '; port=3306;dbname=' . $this->dbName . ';charset=utf8mb4',
//                 $this->userName,
//                 $this->password,
//                 $this->options);
//         } catch (PDOException $e) {
//             echo $e->getMessage();
//         }
//     }
// }
// $pdo = new database();
// return $pdo;


$hostname = '127.0.0.1';
$username = 'root';
$password = 'hell';
$db_name = 'homework0101';
$dsn = "mysql:host=$hostname;port=3306;dbname=$db_name;charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    // echo 'success';
} catch (PDOException $e) {
    echo  $e->getMessage();
}