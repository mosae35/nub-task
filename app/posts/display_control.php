<?php

//database connection file
require 'app/database/conn.php';

//query statment
$sql = "select * from `posts`";

//protect data from sql inj by pdo bindparam
$stmt = $dbh->prepare($sql);

//check query if true go to dashboard//
if ($stmt->execute()) {
    $data = $stmt->fetchAll();
} else {
    echo 'faild';
}



