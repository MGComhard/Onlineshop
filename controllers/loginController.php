<?php
require_once __DIR__ . "/../includes/authentifizierung.php";
session_start();

$session_lifetime = 3600;
ini_set('session.gc_maxlifetime', $session_lifetime);
setcookie(session_name(), session_id(), time() + $session_lifetime, "/");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === 'geheim') {
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
        header("Location: ../index.php");
        exit;
    } else {
        header("Location: ../index.php?page=login&error=1");
        exit;
    }
}
