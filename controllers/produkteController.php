<?php
require_once "includes/authentifizierung.php";
require_once "includes/produktViewHelper.php";

$jsonPfad = __DIR__ . '/../includes/produktdaten.JSON';
$jsonInhalt = file_get_contents($jsonPfad);
$produkte = json_decode($jsonInhalt, true);

if ($produkte === null) {
    echo "<p>Produktdaten konnten nicht geladen werden. Bitte versuchen Sie es später erneut.</p>";
    exit;
}

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

            echo "<p>" . htmlspecialchars($produkt['name']) . " wurde dem Warenkorb hinzugefügt ({$quantity} Stück).</p>";
            break;
        }
    }
}

$pageTitle = "Produkte";
include "templates/produkte.php";
?>