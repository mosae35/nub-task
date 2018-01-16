<?php

//start session
session_start();


//chek if user has asession 
if (isset($_SESSION['username'])) {
    session_destroy();
    header("location:login_view.html");
} else {
    echo 'no session yet for that user';
}
