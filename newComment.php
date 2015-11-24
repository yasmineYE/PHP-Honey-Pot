<?php
session_start();

if(isset($_SESSION['user']) || isset($_SESSION['new_user'])){
?>
<html>
<head>
  <title>Create a comment</title>
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="./ajax.js"></script>
  <link rel="stylesheet"  href="style.css">
</head>
<body>
  <div id="header">
    <h1> Welcome to my web application </h1>
  </div>
  <div id="main">
    <form method="POST">
      <label for="title">Title: </label>
      <input type="text" id="title" name="title"><br>
      <label for="content"> Content: </label>
      <textarea name="content" id="content" rows="5"></textarea></br>
      <br>
    </form>
  </div>
  <div id="menu">
    <input type="button" value="submit" onclick="send()">
    <input type="button" value="back" onclick="location.href='comment.php';">
  </div>
  <div id="message" />
</body>
</html>
<?php
}else{
  echo 'session stoped';
}
?>
