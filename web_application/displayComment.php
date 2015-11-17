<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

$host = '192.168.1.2';
$user = 'yasmine';
$pwd = 'elhimdi123';
$database = 'comments';

$conn = mysqli_connect($host, $user, $pwd, $database) or die("Error" .  mysqli_error($conn));

if(empty($_POST['title']) || empty($_POST['date'])){
    echo 'Nothing to display';
}else{
    $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
    $req = $conn->query("SELECT * FROM list WHERE title='".$title."'");

    if($row = $req->fetch_row()){
        $date = $row[3];
        $content = $row[1];
    }
    echo'
    <html>
    <script type="text/javascript" src="./ajax.js"></script>
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
        <div id="message">

        </div>

    </body>
</html>
';


}
