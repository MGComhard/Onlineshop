
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($pageTitle) ? $pageTitle : "Obst-Shop"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php if (isset($_SESSION['logged_in'])): ?>
        <div style="text-align:right; padding:10px;">
            Eingeloggt als <strong>admin</strong> | <a href="index.php?page=logout">Logout</a>
        </div>
    <?php endif; ?>

    <nav>
        <ul>
            <li><a href="index.php?page=home">Home</a></li>
            <li><a href="index.php?page=produkte">Produkte</a></li>
            <li><a href="index.php?page=warenkorb">Warenkorb</a></li>
            <li><a href="index.php?page=kontakt">Kontakt</a></li>
        </ul>
    </nav>
    <hr>
