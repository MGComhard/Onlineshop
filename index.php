
    <?php
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit;
    }

    $pageTitle = "Startseite"; 
    include "includes/header.php";
    ?>
    <h1>Willkommen im Obst-Shop 🍎🍌🍊</h1>
	<p>Wähle ein Produkt aus und füge es Deinem Warenkorb hinzu. Viel Spaß beim Einkaufen</p>

    <nav>
        <ul>
            <li><a href="produkte.php">Produkte ansehen</a></li>
            <li><a href="warenkorb.php">Warenkorb anzeigen</a></li>
        </ul>
    </nav>

    <?php include "includes/footer.php"; ?>
