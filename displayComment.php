<?php

session_start();

if(empty($_POST['title']) || empty($_POST['date'])){
  echo 'Nothing to display';
}else{
  $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
  $conn = require_once('./mysql_connect.php');
  $req = $conn->query("SELECT * FROM list WHERE title='".$title."'");

  if($row = $req->fetch_row()){
    $date = $row[3];
    $content = $row[1];
  }
echo <<<HTML
<html>
<head>
  <title>My wonderful application</title>
</head>
<body>
  <div id="main">
    <label for="date">Date </label>
    <textarea id="dateDisplay" rows="1">'.$date.'</textarea></br>
    <br>
    <label for="title"> Title </label>
    <textarea id="titleDisplay" rows="1">'. $title . '</textarea></br>
    <br>
    <label for="content"> Content </label>
    <textarea id="contentDisplay" rows="8">'. $content .'</textarea></br>
  </div>
  <div id="menu">
    <input type="button" value="back" onclick="back()" />
  </div>
  <div id="message" />
<script type="text/javascript" src="./ajax.js"></script>
</body>
</html>';
}
