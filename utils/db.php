<?php 

$host = 'localhost';
$dbname = 'todolist';
$dbusername = 'root';
$dbpassword = '';

session_start();

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // throwing error if any
} catch (PDOException $e) { // catching exception thrown
    // die("Connection Failed: " . $e->getMessage());
    echo "Connection Failed: " . $e->getMessage();
}

// pdo - php data objects