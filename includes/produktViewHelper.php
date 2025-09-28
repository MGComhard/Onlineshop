<?php
function getProductView($produkt, $showImage = true, $showDescription = true, $isDetailView = false) {
    if (!$produkt) {
        return "<p>Produkt nicht gefunden.</p>";
    }

    $html = $isDetailView
        ? "<div class='product product-detail' style='text-align: center;'>"
        : "<div class='product' style='display: flex; align-items: center; gap: 20px;'>";

    if ($showImage && !empty($produkt['image'])) {
        $imageStyle = $isDetailView
            ? "style='max-height: 300px; width: auto; margin-top: 1rem;'"
            : "style='height: 80px;'";

        $html .= "<img src='" . htmlspecialchars($produkt['image']) . "' alt='" . htmlspecialchars($produkt['name']) . "' $imageStyle>";
    }

    $html .= "<div" . ($isDetailView ? " style='max-width: 600px; margin: 0 auto;'" : "") . ">";
    $html .= "<h2>" . htmlspecialchars($produkt['name']) . "</h2>";
    $html .= "<p><strong>Preis:</strong> " . number_format($produkt['price'], 2, ',', '.') . " €</p>";

    if ($showDescription) {
        $html .= "<p>" . htmlspecialchars($produkt['description']) . "</p>";
    }

    $html .= "</div></div>";

    return $html;
}
?>
