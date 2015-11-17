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

if(empty($_POST['title'])){
    echo 'Nothing to remove';
}else{
    $title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);

    $req = $conn->query("DELETE FROM list WHERE title='".$title."'");

    if($req){
        echo 'removed';
    }else{
        echo 'problem';
    }
}
