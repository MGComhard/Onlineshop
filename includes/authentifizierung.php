<?php

function checkLogin() {
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['login_time'] + 3600 < time()) {
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}