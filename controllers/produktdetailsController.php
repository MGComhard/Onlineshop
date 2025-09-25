<?php
require_once "includes/authentifizierung.php";

// Produktdaten (optional auslagern in includes/produktdaten.php)
$produkte = [
    ['id' => 1, 'name' => 'Apfel', 'price' => 0.99, 'description' => "Frische Äpfel vom Land."],
    ['id' => 2, 'name' => 'Banane', 'price' => 0.79, 'description' => "Süße Bananen aus Mittelamerika."],
    ['id' => 3, 'name' => 'Orange', 'price' => 1.29, 'description' => "Orangen aus Andalusien"],
    ['id' => 4, 'name' => 'Weintrauben (1kg)', 'price' => 2.99, 'description' => "Knackige grüne Weintrauben aus dem Moselgebiet"],
    ['id' => 5, 'name' => 'Pflaume', 'price' => 0.89, 'description' => "Heimische frische Pflaumen"],
    ['id' => 6, 'name' => 'Birne', 'price' => 0.59, 'description' => "Aromatische Birne"],
];

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