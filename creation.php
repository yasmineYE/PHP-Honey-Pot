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

if(empty($_POST['login']) || empty($_POST['password']) || empty($_POST['sd_password'])){
    echo 'Empty fields';
}else{

    $login = strip_tags(trim($_POST['login']));
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $sd_password = filter_var($_POST['sd_password'],FILTER_SANITIZE_STRING);

    if(!empty($login)){

        $test_req = $conn->query("SELECT * FROM users WHERE login='".$login."'");

        if($row = mysqli_fetch_row($test_req)){
            echo 'Login already exists';
        }else{
            if($password == $sd_password){
              $creation_req = $conn->query("INSERT INTO users(login,password) VALUES ('".$login."','".$password."')");
              if($creation_req){
                echo 'Registred';
                $_SESSION['new_user'] = $password;
              }else{
                die(mysqli_error($creation_req));
                    }
              }
            }else{
                echo 'Wrong password match. Please try again';
            }
        }

    }else{
        echo 'Login invalid';
    }
}
