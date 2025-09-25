<?php

$pageTitle = "Kontakt";
$meldung = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $nachricht = htmlspecialchars($_POST['nachricht'] ?? '');

    // Dummy-Verarbeitung
    $meldung = "Vielen Dank, $name! Deine Nachricht wurde übermittelt.";
}

include "templates/kontakt.php";