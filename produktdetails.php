<?php
session_start();

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
include "includes/header.php";
?>

<?php if ($produkt): ?>
    <h1><?php echo htmlspecialchars($produkt['name']); ?></h1>
    <p><strong>Preis:</strong> <?php echo htmlspecialchars($produkt['price']); ?> €</p>
    <p><strong>Beschreibung:</strong> <?php echo htmlspecialchars($produkt['description']); ?></p>

    <form method="POST" action="produkte.php">
        <input type="hidden" name="product_id" value="<?php echo $produkt['id']; ?>">
        <label>Menge:
            <input type="number" name="quantity" value="1" min="1" style="width:50px;">
        </label>
        <button type="submit" name="add_to_cart">In den Warenkorb</button>
    </form>
<?php else: ?>
    <p>Produkt nicht gefunden.</p>
<?php endif; ?>

<p><a href="produkte.php">Zurück zur Produktliste</a></p>
<?php include "includes/footer.php"; ?>
