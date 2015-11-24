<?php

header('Content-Type: text/plain');
session_start();

if(isset($_SESSION['user']) || isset($_SESSION['new_user'])){

  if(empty($_POST['title']) || empty($_POST['content'])){
    echo 'Empty fields';
  }else{
    $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
    $title = strip_tags(trim($title));

    $content = filter_var($_POST['content'],FILTER_SANITIZE_STRING);
    $date = date("M/d/y, h:i:sa");

    if(!empty($title)){
      $conn = require_once('./mysql_connect.php');
      $exist = $conn->query("SELECT * FROM list WHERE title='".$title."'");

      if(mysqli_num_rows($exist) != 0){
        echo'Please choose another title';
      }else{
        $com_req = $conn->query("INSERT INTO list(title,content,date) VALUES('".$title."','".$content."','".$date."')");
        if($com_req){
          echo 'OK';
        }else{
          echo'Creation error';
        }
      }
    }else{
      echo 'Wrong input';
    }
  }
}
