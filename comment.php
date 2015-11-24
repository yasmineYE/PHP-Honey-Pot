<?php
session_start();
if(isset($_SESSION['user']) || isset($_SESSION['new_user'])){
  $conn = require_once('./mysql_connect.php');
  $req = $conn->query("SELECT title,date FROM list");

if($req){
?>

<html>
<head>
  <?php echo require_once('./header.php'); ?>
</head>
<body>
  <div id="header">
    <h1> Welcome to my web application </h1>
  </div>
  <div id="main">
  <?php
    if(mysqli_num_rows($req) == 0){
      echo '<h3> Empty list of comments </h3>';
    }else{
      echo '<table id="commentTable" border="1" cellpadding="2">';
      echo '<tr>';
      echo '<th> Date </th>';
      echo '<th> Title </th>';
      echo '<th> Delete </th>';
      $num = mysqli_num_rows($req);
      for($i=0; $i<$num; $i++){
        $row = mysqli_fetch_row($req);
        echo '<tr>';
        echo '<td>'.$row[1].'</td>';
        echo ' <td><a href="#" onclick="javascript:displayComment(this)">'. $row[0] . '</a></td>';
        echo '<td><input type="button" value="delete" onclick="javascript:foo()"/></td>';
        echo '</tr>';
      }
      echo '</tr>';
      echo '</table>';
    }
  ?>
  </div>
  <div id="menu">
    <input type="button" value="new comment" onclick="location.href='newComment.php';"/>
    <input type="button" value="logout" onclick="location.href='logout.php';"/></br>
  </div>

<?php
}else{
  echo '<h3> Nothing to display </h3>';
}
?>

  <div id="message" />
</body>
</html>

<?php
}else{
  echo 'Login first to access the page';
}
?>
