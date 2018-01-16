<?php

session_start();
require '../database/conn.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Send message') {

    //prepare data
    $username = $_SESSION['username'];
    $sql = "select * from `users` where username = :username";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    if ($stmt->execute()) {
        $data = $stmt->fetch();
        $id = $data['id'];
    }

    //filter data come from user
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
    $date = date("Y-m-d H:i:s");
    $user_id = $id;
    //query statment

    //check inputs
    if (!empty($title && $content)) {
        $sql = " INSERT INTO `posts` (`id`, `title`, `conten`, `date`, `user_id`) 
             VALUES (NULL, :title, :content, :date, :user_id)";

        //protect data from sql inj by pdo 
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        //check query if true go to dashboard//
        if ($stmt->execute()) {
            header("location:/test/");
            $_SESSION['success'] = 'new post added successfuly';
        } else {
            echo 'faild to to add post please try later';
        }
    }else{
        echo 'please fill that data';
    }
}  
