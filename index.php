<?php

require 'app/database/conn.php';
if (@$_GET['page']) {
    $url = 'app/' . $_GET['page'];
    if (file_exists($url))
        include $url;
}else {
    include 'app/home.php';
}