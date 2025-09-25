<?php
require_once "includes/authentifizierung.php";

// Produkt entfernen / Menge ändern
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'] ?? null;

    if (isset($_POST['remove_product'])) {
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['id'] == $product_id) {
                unset($_SESSION['cart'][$index]);
                $meldung = "Produkt wurde entfernt.";
                break;
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    if (isset($_POST['more_products'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity'] += 1;
                break;
            }
        }
    }

    if (isset($_POST['less_products'])) {
        foreach ($_SESSION['cart'] as $index => &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity'] -= 1;
                if ($item['quantity'] <= 0) {
                    unset($_SESSION['cart'][$index]);
                }
                break;
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

$gesamtpreis = 0;
$warenkorb = $_SESSION['cart'] ?? [];

foreach ($warenkorb as $item) {
    $gesamtpreis += $item['price'] * $item['quantity'];
}

$pageTitle = "Warenkorb";
include "templates/warenkorb.php";