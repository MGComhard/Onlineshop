
<?php
session_start();
$pageTitle = "Kontakt";
include "includes/header.php";
?>

<h1>Kontaktformular</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $nachricht = htmlspecialchars($_POST['nachricht'] ?? '');

    // Dummy-Verarbeitung
    echo "<p style='color:green;'>Vielen Dank, $name! Deine Nachricht wurde übermittelt.</p>";
}
?>

<form method="POST" style="max-width:400px;">
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

<?php include "cartWidget.php"; ?>
<?php include "includes/footer.php"; ?>
