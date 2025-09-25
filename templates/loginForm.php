<h1>Login</h1>
<?php if (isset($_GET['error'])): ?>
    <p style="color:red;">Benutzername oder Passwort falsch.</p>
<?php endif; ?>

<form method="POST" action="controllers/loginController.php">
    <label>Benutzername: <input type="text" name="username" required></label><br>
    <label>Passwort: <input type="password" name="password" required></label><br>
    <button type="submit">Einloggen</button>
</form>