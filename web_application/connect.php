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

if(empty($_POST['login']) || empty($_POST['password'])){
    echo 'Empty fields';
}else{

    $login = filter_var($_POST['login'],FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);


    $result = $conn->query("SELECT * FROM users WHERE login='".$login."' AND password='".$password."'");

    if($row = mysqli_fetch_row($result)){
        //Creating a user session
        $_SESSION['user'] = $row[2];
        echo 'Connected';
    }else{
            echo 'Wrong login or password. Please try again.';
        }

}
