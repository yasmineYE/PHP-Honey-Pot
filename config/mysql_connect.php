<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$host = 'localhost';
$user = 'root';
$pwd = '';
$database = 'main';

$conn = new mysqli($host, $user, $pwd);
if($conn) {
  $conn->select_db("main");
}

if($conn->connect_error) {
   die("Error de connexion à la base de données : ".$conn->connect_error);
}

return $conn;
?>
