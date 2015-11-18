<?php
  $host = '192.168.1.2';
  $user = 'yasmine';
  $pwd = 'elhimdi123';
  $database = 'comments';

  return mysqli_connect($host, $user, $pwd, $database) or die("Error" .  mysqli_error($conn));

?>
