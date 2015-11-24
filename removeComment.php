<?php
session_start();

if(empty($_POST['title'])){
  echo 'Nothing to remove';
}else{
  $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
  $conn = require_once('./mysql_connect.php');
  $req = $conn->query("DELETE FROM list WHERE title='".$title."'");

  if($req){
    echo 'removed';
  }else{
    echo 'problem';
  }
}
