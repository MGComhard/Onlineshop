<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['logged_in']) && !in_array($_GET['page'] ?? 'home', ['login', 'logout'])) {
    header("Location: index.php?page=login");
    exit;
}

$page = $_GET['page'] ?? 'home';
$pageTitle = match ($page) {
    'home' => 'Startseite',
    'produkte' => 'Produkte',
    'details' => 'Produktdetails',
    'warenkorb' => 'Warenkorb',
    'kontakt' => 'Kontakt',
    'login' => 'Login',
    'logout' => 'Logout',
    default => 'Unbekannte Seite'
};

switch ($page) {
    case 'home':
        include __DIR__ . "/templates/home.php";
        break;
    case 'produkte':
        include __DIR__ . "/controllers/produkteController.php";
        break;
    case 'details':
        include __DIR__ . "/controllers/produktdetailsController.php";
        break;
    case 'kontakt':
        include __DIR__ . "/controllers/kontaktController.php";
        break;
    case 'warenkorb':
        include __DIR__ . "/controllers/warenkorbController.php";
        break;
    case 'login':
        include __DIR__ . "/templates/loginForm.php";
        break;
    case 'logout':
        include __DIR__ . "/controllers/logoutController.php";
        break;
    default:
        echo "<h1>404 – Seite nicht gefunden</h1>";
}
