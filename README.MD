# 🛒 Simpler PHP-Onlineshop für Obst

Willkommen bei meinem minimalistischen Onlineshop!  
Dieser kleine Shop wurde in PHP geschrieben und ermöglicht es, Obstprodukte auszuwählen, in den Warenkorb zu legen und sich über ein einfaches Login-System anzumelden. Ideal für Lernzwecke oder kleine eigene Projekte!

## ✨ Features

- 🥝 Auswahl verschiedener Obstsorten
- 🛍️ Warenkorb-Funktionalität
- 🔐 Einfache Benutzeranmeldung
- 🌐 Anzeige im Browser über Apache2

---

## ⚙️ Voraussetzungen

Bevor du loslegst, stelle sicher, dass du folgende Software installiert hast:

- Ubuntu Server (getestet unter Ubuntu 22.04 LTS)
- Apache2 Webserver
- PHP (mindestens Version 7.4)
- Git (für den Download des Projekts)

---

## 🚀 Installation

Führe die folgenden Schritte aus, um den Shop lokal oder auf einem Server zum Laufen zu bringen:

```bash
# Schritt 1: Wechsle ins Webverzeichnis (z. B. /var/www/)
cd /var/www/

# Schritt 2: Klone das Repository
git clone https://github.com/MGComhard/Onlineshop.git

# Schritt 3: Setze die richtigen Berechtigungen (optional, je nach Setup)
sudo chown -R www-data:www-data Onlineshop
sudo chmod -R 755 Onlineshop

# Schritt 4: Stelle sicher, dass Apache und PHP laufen
sudo systemctl start apache2
sudo systemctl enable apache2

# Schritt 5: Rufe den Shop im Browser auf
# Beispiel: http://localhost/Onlineshop oder http://[Server-IP]/Onlineshop
