<?php

if (isset($_GET['page']) && $_GET['page'] == 'posts/delete_control.php') {
    $id = $_GET['id'];

    //query statment
    $sql = "DELETE FROM `posts` WHERE `id` = :id";

    //protect data from sql inj by pdo bindparam
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header("location:?page=home.php");
    }
}