<?php 

$server_name = "localhost";
$user_name = "root";
$password = "";
$dataBase_name="devblog_db";

$dsn = "mysql:host=$server_name;dbname=$dataBase_name;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $user_name, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'conx good';
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
       
?>