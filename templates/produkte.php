<?php
include "templates/header.php";
?>

<h1>Produkte</h1>
<ul>
    <?php foreach ($produkte as $produkt): ?>
        <li style="margin-top: 1rem;">
            <strong><?php echo htmlspecialchars($produkt['name']); ?></strong> – 
            <?php echo htmlspecialchars($produkt['price']); ?> €

            <div style="margin-top:5px; margin-bottom:2px; font-size:0.9em; font-style:italic;">
                <?php echo htmlspecialchars($produkt['description']); ?>
            </div>

	    <a href="<?php echo htmlspecialchars('index.php?page=details&id=' . $produkt['id']); ?>">Details ansehen</a>

            <form method="POST" action="index.php?page=produkte" style="margin-top:5px;">
                <input type="hidden" name="product_id" value="<?php echo $produkt['id']; ?>">
                <label>Menge:
                    <input type="number" name="quantity" value="1" min="1" style="width:50px;">
                </label>
                <button type="submit" name="add_to_cart">In den Warenkorb</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

<p><a href="index.php?page=warenkorb">Zum Warenkorb</a></p>

<?php include "templates/cartWidget.php"; ?>
<?php include "templates/footer.php"; ?>