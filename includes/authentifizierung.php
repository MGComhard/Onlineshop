
<?php
session_start();

// prüft, ob jemand eingeloggt ist und ob die Session abgelaufen ist.
if (!isset($_SESSION['logged_in']) || $_SESSION['login_time'] + 3600 < time()) {
    session_destroy();
    header("Location: login.php");
    exit;
}