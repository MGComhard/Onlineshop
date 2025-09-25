<?php include "templates/header.php"; ?>

<h1>Kontaktformular</h1>

<?php if ($meldung): ?>
    <p style="color:green;"><?= $meldung ?></p>
<?php endif; ?>

<form method="POST" action="index.php?page=kontakt" style="max-width:400px;">
    <label>Name:<br>
        <input type="text" name="name" required>
    </label><br><br>

    <label>E-Mail:<br>
        <input type="email" name="email" required>
    </label><br><br>

    <label>Nachricht:<br>
        <textarea name="nachricht" rows="5" required></textarea>
    </label><br><br>

    <button type="submit">Absenden</button>
</form>

<?php include "templates/footer.php"; ?>