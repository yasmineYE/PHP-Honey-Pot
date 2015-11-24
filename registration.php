<!DOCTYPE html>
<html>
<head>
  <?php echo require_once('./header.php'); ?>
</head>
<body>
  <div id="header">
    <h1>Welcome to my web application</h1>
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
