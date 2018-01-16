<?php

session_start();

if (isset($_SESSION['username'])) {
    include 'app/layout/nav.php';
    include 'app/posts/add_view.php';
    include 'app/posts/all_posts.php';
    include 'app/layout/footer.php';
} else {
    header("location:app/users/login_view.html");
}

