<?php

if (isset($_POST['submit']) && $_POST['submit'] == 'Update') {
    $id = $_GET['id'];
    //filter data come from user
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);

    if (!empty($title && $content)) {
        //query statment
        $sql = "UPDATE `posts` SET `title` = :title, `conten`=:conten   WHERE `id` = :id";

        //protect data from sql inj by pdo bindparam
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':conten', $content, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("location:?page=home.php");
        }
    } else {
        echo 'please fill this data';
    }
}