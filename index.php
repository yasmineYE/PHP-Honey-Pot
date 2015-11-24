<!DOCTYPE html>
<html>
  <head>
    <?php echo require_once('./header.php'); ?>
  </head>
  <body>
    <div id="header">
      <h1> Welcome to my web application </h1>
    </div>
    <div id="main">
      <form method="POST">
        <label id="myLogin">Login ID : </label>
        <input id="login" type="text"><br>
        <label id="myPassword"> Password : </label>
        <input id="password" type="password"></br>
        <br>
        <input type="button" value="login" onclick="connect()">
        <input type="button" value="new user" onclick="location.href='registration.php';">
      </form>
    </div>
    <div id="message" />
  </body>
</html>
