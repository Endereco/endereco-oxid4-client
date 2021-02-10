# Endereco Adressservices Integration für Oxid 4

Dieser Projekt ist ein Backport der Integration für Oxid 6 Onlinehsopsysteme, die man [hier](https://github.com/Endereco/endereco-oxid6-client) findet.

Die Lösung enthält alle Funktionen des ursprünglichen Modul mit Oxid 4 spezifischen Anpassungen: 

- keine Namespaces
- ISO-8859-1 Zeichenkodierung wird unterstützt
- metadata.php der 1.1 Version

## Installation

Um das Modul in einem onlineshop zu installieren, muss zuerst der Quellcode heruntergeladen werden. 
Hierfür steht die [Auflistung der Releases](https://github.com/Endereco/endereco-oxid4-client/releases) zur Verfügung.

Jeder Release enthält eine herunterladbare Datei, einen ZIP Archiv, die alle notwendige Dateien des Moduls enthält.

Alternativ kann man gewünschte Version über `git clone` herunterziehen. 

Falls man vor der Installation noch irgendwelche Anpassungen an JS Logik des Moduls machen möchte, soll der npm-Buildskript ausgeführt werden: `npm install && npm run build`. Im Normallfall ist dies jedoch nicht notwendig.

Nachdem man den Quellcode der Datei heruntergeladen hat, soll der Archiv entpackt werden 
(falls als Archiv heruntergeladen) und der ganze Quellcode im Onlineshop im Verzeichnis abgelegt werden:

`%SHOP_ROOT%/modules/endereco-oxid4-client`

D.h. der ganze Pfad zu `metadata.php` wäre zum Beispiel `%SHOP_ROOT/modules/endereco-oxid4-client/metadata.php`

Ist dies gemacht, soll das Modul in der Auflistung der Module im Backend von Onlineshop sichtbar sein. Modul ist somit installiert.

![Modul ist in Listenansicht der Mdoule sichtbar](doc/install_1.png)

## Aktivation des Moduls

Vor der Aktivation ist es empfehlenswert einen API-Key bei Endereco anzufragen. Dafür kann man entweder über [die Website von Endereco](https://www.endereco.de/) eine Anfrage erstellen oder direkt beim robert@endereco.de per E-Mail anfragen.

Trägt man den API-Key in Einstellungen ein und klickt auf "Aktivieren", ist das Modul sofort aktiviert und einsatzbereit.

Es ist jedoch empfehlenswert sich die Einstellungen nochmal genauer anzuschauen und Feature zu aktivieren/deaktivieren, die man braucht.

## Konfiguration des Moduls aus dem Backend

