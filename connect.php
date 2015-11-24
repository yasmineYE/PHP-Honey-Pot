<?php

session_start();

if(empty($_POST['login']) || empty($_POST['password'])){
  echo 'Empty fields';
}else{
  $conn = require_once('./mysql_connect.php');
  $login = filter_var($_POST['login'],FILTER_SANITIZE_STRING);
  $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
  $result = $conn->query("SELECT * FROM users WHERE login='".$login."' AND password='".$password."'");

  if($row = mysqli_fetch_row($result)){
    //Creating a user session
    $_SESSION['user'] = $row[2];
    echo 'Connected';
  }else{
    echo 'Wrong login or password. Please try again.';
  }
}
?>
