<?php include "templates/header.php"; ?>

<h1>Warenkorb</h1>

<?php if (isset($meldung)): ?>
    <p style="color:green;"><?= htmlspecialchars($meldung) ?></p>
<?php endif; ?>

<?php if (!empty($warenkorb)): ?>
    <ul>
        <?php foreach ($warenkorb as $item): ?>
            <li>
                Produkt: <?= htmlspecialchars($item['name']) ?> –
                Preis je: <?= htmlspecialchars($item['price']) ?> € –
                Anzahl: <?= htmlspecialchars($item['quantity']) ?>

                <form action="index.php?page=warenkorb" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                    <button name="more_products" type="submit">+</button>
                    <button name="less_products" type="submit">−</button>
                    <button name="remove_product" type="submit">Entfernen</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <h3>Gesamtpreis: <?= number_format($gesamtpreis, 2, ',', '.') ?> €</h3>
<?php else: ?>
    <p>Ihr Warenkorb ist leer.</p>
<?php endif; ?>

<?php include "templates/footer.php"; ?>