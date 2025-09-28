<?php include "templates/header.php"; ?>

<div style="max-width: 800px; margin: 2rem;">
    <h1>Produkte</h1>
    <ul style="list-style: none; padding: 0;">
        <?php foreach ($produkte as $produkt): ?>
            <li style="margin-top: 2rem; border-bottom: 1px solid #ccc; padding-bottom: 1rem;">
                <?= getProductView($produkt, true, false) ?>

                <div style="margin: 10px 0 10px 0;"><a href="index.php?page=details&id=<?= htmlspecialchars($produkt['id']) ?>"
                 style="text-decoration: none; color: #007BFF; font-weight: bold;">➤ Details ansehen
    </a>
</div>

                <form method="POST" action="index.php?page=produkte" style="margin-top:5px;">
                    <input type="hidden" name="product_id" value="<?= $produkt['id'] ?>">
                    <label>Menge:
                        <input type="number" name="quantity" value="1" min="1" style="width:50px;">
                    </label>
                    <button type="submit" name="add_to_cart">In den Warenkorb</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="index.php?page=warenkorb">Zum Warenkorb</a></p>
</div>

<?php include "templates/footer.php"; ?>