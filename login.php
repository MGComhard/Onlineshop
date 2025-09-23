
<?php
session_start();

// Ablaufzeit setzen
$session_lifetime = 3600;
ini_set('session.gc_maxlifetime', $session_lifetime);
setcookie(session_name(), session_id(), time() + $session_lifetime, "/");

// Login prüfen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Dummy-Zugangsdaten
    if ($username === 'admin' && $password === 'geheim') {
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
        header("Location: index.php");
        exit;
    } else {
        $error = "Benutzername oder Passwort falsch.";
    }
}
?>

<?php
$pageTitle = "Login";
include "includes/header.php";
?>

<h1>Login</h1>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    <label>Benutzername: <input type="text" name="username" required></label><br>
    <label>Passwort: <input type="password" name="password" required></label><br>
    <button type="submit">Einloggen</button>
</form>

<?php include "cartWidget.php"; ?>

<?php include "includes/footer.php"; ?>
