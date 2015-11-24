<?php

session_start();

if(empty($_POST['login']) || empty($_POST['password']) || empty($_POST['sd_password'])){
  echo 'Empty fields';
}else{
  $login = strip_tags(trim($_POST['login']));
  $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
  $sd_password = filter_var($_POST['sd_password'],FILTER_SANITIZE_STRING);

  if(!empty($login)){
    $conn = require_once('mysql_connect.php');
    $test_req = $conn->query("SELECT * FROM users WHERE login='".$login."'");

    if(!$test_req){
      echo die("Error : ".mysqli_error($conn));
    }else{
      if($password == $sd_password){
        $creation_req = $conn->query("INSERT INTO users(login,password) VALUES ('".$login."','".$password."')");
        if($creation_req){
          echo 'Registred';
          $_SESSION['new_user'] = $password;
        }else{
          die(mysqli_error($conn));
        }
      }else{
        echo 'Wrong password match. Please try again';
      }
    }
  }else{
    echo 'Login invalid';
  }
}
