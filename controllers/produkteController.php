<?php
require_once "includes/authentifizierung.php";

$produkte = [
    ['id' => 1, 'name' => 'Apfel', 'price' => 0.99, 'description' => "Frische Äpfel vom Land."],
    ['id' => 2, 'name' => 'Banane', 'price' => 0.79, 'description' => "Süße Bananen aus Mittelamerika."],
    ['id' => 3, 'name' => 'Orange', 'price' => 1.29, 'description' => "Orangen aus Andalusien"],
    ['id' => 4, 'name' => 'Weintrauben (1kg)', 'price' => 2.99, 'description' => "Knackige grüne Weintrauben aus dem Moselgebiet"],
    ['id' => 5, 'name' => 'Pflaume', 'price' => 0.89, 'description' => "Heimische frische Pflaumen"],
    ['id' => 6, 'name' => 'Birne', 'price' => 0.59, 'description' => "Aromatische Birne"],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = max(1, intval($_POST['quantity']));

    foreach ($produkte as $produkt) {
        if ($produkt['id'] == $product_id) {
            $found = false;

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['id'] == $product_id) {
                        $item['quantity'] += $quantity;
                        $found = true;
                        break;
                    }
                }
            } else {
                $_SESSION['cart'] = [];
            }

            if (!$found) {
                $_SESSION['cart'][] = [
                    'id' => $produkt['id'],
                    'name' => $produkt['name'],
                    'price' => $produkt['price'],
                    'quantity' => $quantity
                ];
            }

            echo "<p>{$produkt['name']} wurde dem Warenkorb hinzugefügt ({$quantity} Stück).</p>";
            break;
        }
    }
}

$pageTitle = "Produkte";
include "templates/produkte.php";
?>