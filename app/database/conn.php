<?php

//vars of database
$user = 'root';
$pass = '';

//chck connection if not will throw exception and die//
try {
    $dbh = new PDO('mysql:host=localhost;dbname=nub', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>