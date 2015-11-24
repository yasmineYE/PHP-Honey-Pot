<?php

// Database architecture
// # main
// - users
//   - id
//   - login
//   - password


$sql_users = <<<SQL
  CREATE TABLE users
  (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    login varchar(255),
    password varchar(255)
  );
SQL;

$sql_list = <<<SQL
  CREATE TABLE list
  (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(255),
    date varchar(255),
    content varchar(255)
  );
SQL;

$conn = require_once('./config/mysql_connect.php');
$res = $conn->query("DROP DATABASE main;");
$res = $conn->query("CREATE DATABASE main;");
$conn->select_db("main");
if($res) {
  $res = $conn->query($sql_users);
  if($res) {
    $res = $conn->query($sql_list);
    if($res) {
      echo "Installation done.";
    } else {
      echo "Cannot create list table : ".$conn->error;
    }
  } else {
    echo "Cannot create users table : ".$conn->error;
  }
} else {
  echo "Cannot create database named 'main'\n".$conn->error;
}

?>
