<?php

session_start();
require '../database/conn.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Register') {

    //filter data come from user
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ENCODED);
    $password = hash("md5", $password);

    if(!empty($username && $password)){
        //query statment
    $sql = "INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, :username, :password)";

    //protect data from sql inj by pdo 
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_INT);

    //check query if true go to dashboard//
    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $value['id'];
        header("location:../../index.php");
    } else {
        echo 'faild to register';
    }
    }else{
        echo 'please fill this data';
    }
}
    
