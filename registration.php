<!DOCTYPE html>
<html>
  <head>
    <title>User's registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="./ajax.js"></script>
  </head>
  <body>
    <div id="header">
      <h1> Welcome to my web application </h1>
    </div>
    <div id="main">
      <form method="POST">
        <label for="login">New Login ID : </label>
        <input id="login" type="text"><br>
        <label for="password"> Enter New Password : </label>
        <input id="password" type="password"></br>
        <label for="sd_password"> Re-enter New Password : </label>
        <input id="sd_password" type="password"></br>
        <br>
        <input type="button" value="create new user" onclick="createUser()">
      </form>
    </div>
    <div id="message" />
  </body>
</html>
