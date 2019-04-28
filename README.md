# WEB_18_Quitz
Repository for the Web Development project

## Organisatorisches

Teammitglieder:
- Kadir Akdogan
- Alexander Joachimstaller
- Julian Eisenmann

Projektname:
Implementierung des Spiels "Wer wird Millionär". Genutzt wird hierfür Bootstrap für die Front-End-Entwicklung (HTML, CSS; JavaScript),  PHP für die Back-End-Entwicklung und MySQL als Datenbankserver für gespeicherte Fragen.

## Datenbank
Die Datenbank wird mithilfe von XAMPP bereitgestellt (MySQL). Dabei befindet sich im Ordner db eine Dumb-Datei der DB und das dazugehörige CREATE Statement inkl. Befüllung mit Daten. Über PHP wird auf die Datenbank zugegriffen und dabei folgende Pseudo-Abfragen gestellt:

- Abfrage User und Überprüfung
- Abfrage Bestenliste und Befüllung unter Bestenliste
- Abfrage Schwierigkeit und Auswahl der Fragen dafür
- Insert in die DB für Bestenliste und Registrierung

## Front-End Development
Die Front-End Implementierung erfolgt mittels HTML, CSS (Bootstrap) und javascript. Folgendes wird durch die einzelnen Technologien abgebildet:

- HTML: Darstellung der Website
- CSS: Layout und Design (Bootstrap als Basis)
- Javascript: Login-Überprüfung

## Back-End Development
Das Back-End wird mittels PHP umgesetzt. Dazu muss PHP folgende Aufgaben erfüllen können:

- DB-Verbindung mit MySQL XAMPP
- Abfrage der richtigen Daten aus der DB
- Erstellung einer View für Bestenliste
- Einstellung des Schwierigkeitsgrades
- Abfrage der Fragen aus der DB und Überprüfung auf Richtigkeit
