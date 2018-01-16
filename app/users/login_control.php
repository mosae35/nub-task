<?php

//start session
session_start();

//database connection file
require '../database/conn.php';

//when click login
if (isset($_POST['submit']) && $_POST['submit'] == 'Login') {

    //filter data come from user
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ENCODED);

    if(!empty($username && $password)){
        
    //query statment
    $sql = "select * from `users` where username = :username";

    //protect data from sql inj by pdo bindparam
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    //check query if true go to dashboard//
    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $value) {
            //check username
            if ($value['username'] === $username) {
                //check password
                if ($value['password'] == hash("md5", $password)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $value['id'];
                    header("location:../../index.php");
                } else {
                    echo 'your password or username not correct';
                }
            }
        }
    } else {
        echo 'faild to register please try later';
    }
        
    }else{
        header("location:login_view.html");
        $_SESSION['error'] =  ' no let that fields empty ';
    }
}