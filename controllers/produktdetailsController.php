<?php
require_once "includes/authentifizierung.php";

$jsonPfad = __DIR__ . '/../includes/produktdaten.JSON';
$jsonInhalt = file_get_contents($jsonPfad);
$produkte = json_decode($jsonInhalt, true);

if ($produkte === null) {
    echo "<p>Produktdaten konnten nicht geladen werden.</p>";
    exit;
}

// Produkt-ID aus URL holen
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$produkt = null;

// Produkt suchen
foreach ($produkte as $p) {
    if ($p['id'] === $product_id) {
        $produkt = $p;
        break;
    }
}

$pageTitle = $produkt ? $produkt['name'] : "Produkt nicht gefunden";
include "templates/produktdetails.php";