<?php

// Alle Session-Variablen löschen
$_SESSION = array();

// Falls ein Session-Cookie existiert, löschen
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

// Weiterleitung
header("Location: index.php?page=login");
exit;
