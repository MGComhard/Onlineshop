
<?php
if (!isset($_SESSION)) {
    session_start();
}

echo "<hr><h3>🛒 Warenkorb-Übersicht</h3>";

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>" . htmlspecialchars($item['name']) . " × " . htmlspecialchars($item['quantity']) . "</li>";
    }
    echo "</ul>";
    echo '<p><a href="warenkorb.php">Zum Warenkorb</a></p>';
} else {
    echo "<p>Ihr Warenkorb ist leer.</p>";
}
?>