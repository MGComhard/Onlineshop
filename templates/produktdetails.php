<?php include "templates/header.php"; ?>

<?php if ($produkt): ?>
    <h1><?= htmlspecialchars($produkt['name']) ?></h1>
    <p><strong>Preis:</strong> <?= htmlspecialchars($produkt['price']) ?> €</p>
    <p><strong>Beschreibung:</strong> <?= htmlspecialchars($produkt['description']) ?></p>

    <form method="POST" action="index.php?page=produkte">
        <input type="hidden" name="product_id" value="<?= $produkt['id'] ?>">
        <label>Menge:
            <input type="number" name="quantity" value="1" min="1" style="width:50px;">
        </label>
        <button type="submit" name="add_to_cart">In den Warenkorb</button>
    </form>
<?php else: ?>
    <p>Produkt nicht gefunden.</p>
<?php endif; ?>

<p><a href="index.php?page=produkte">Zurück zur Produktliste</a></p>

<?php include "templates/cartWidget.php"; ?>
<?php include "templates/footer.php"; ?>
