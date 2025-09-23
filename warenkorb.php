
    <?php
    require_once "includes/authentifizierung.php";
    $pageTitle = "Warenkorb";
    include "includes/header.php";
    ?>
    <h1>Warenkorb</h1>

    <?php
    // Produkt entfernen
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_id = $_POST['product_id'] ?? null;

        if (isset($_POST['remove_product'])) {
            foreach ($_SESSION['cart'] as $index => $item) {
                if ($item['id'] == $product_id) {
                    unset($_SESSION['cart'][$index]);
                    echo "<p>Produkt wurde entfernt.</p>";
                    break;
                }
            }
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }

        // Menge erhöhen
        if (isset($_POST['increase_quantity'])) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $product_id) {
                    $item['quantity'] += 1;
                    break;
                }
            }
        }

        // Menge verringern
        if (isset($_POST['decrease_quantity'])) {
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

    // Warenkorb anzeigen
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
	$gesamtpreis = 0;
        echo "<ul>";
        foreach ($_SESSION['cart'] as $item) {
		$itemTotal = $item['price'] * $item['quantity'];
		$gesamtpreis += $itemTotal;
            echo "<li>";
            echo "Produkt: " . htmlspecialchars($item['name']) .
                 " – Preis je: " . htmlspecialchars($item['price']) . " €" .
                 " – Anzahl: " . htmlspecialchars($item['quantity']);
		 " - Gesamt: " . number_format($gesamtpreis, 2, ',', '.') . " €";
            ?>

            <form action="warenkorb.php" method="POST" style="display:inline;">
                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                <button name="increase_quantity" type="submit">+</button>
                <button name="decrease_quantity" type="submit">−</button>
                <button name="remove_product" type="submit">Entfernen</button>
            </form>

            <?php
            echo "</li>";
        }
        echo "</ul>";
	echo "<h3>Gesamtpreis: " . number_format($gesamtpreis, 2, ',', '.') . " €</h3>";
    } else {
        echo "<p>Ihr Warenkorb ist leer.</p>";
    }
    ?>
    <?php include "includes/footer.php"; ?>
