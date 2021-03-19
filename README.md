## Instalatie

Voor de technische opdracht heb ik gebruik gemaakt van het Laravel 8 framework en een MySql database. Dit houd in dat voor het reviewen van de technische opdracht een lege database nodig is waar Laravel aan gekoppeld kan worden. Aangezien er gebruik wordt gemaakt van Composer, moet dit ook worden geinstalleerd voor de installatie van de opdracht.

* Stap 1: Clone het project.
* Stap 2: Edit de database connectie gegevens in het .env bestand.
* Stap 3: run "Composer install" in de root directory.
* Stap 4: run "php artisan migrate:fresh --seed" om de database tabellen en testdata aan te maken LET OP: dit verwijderd de huidige inhoud van de aangesloten database.
* Stap 5: run "php artisan serve" om de applicatie lokaal te draaien.

Mochten er vragen zijn over de installatie dan hoor ik dit graag en zal ik z.s.m. contact opnemen.

## Gemaakte aanname bij de opdracht

Aangezien de opdracht niet alle requirements uitgebreid heeft uitgepluist heb ik een aanames gemaakt. Ik heb de aannamen gemaakt dat werknemers die minder dan 5 dagen in de week werken altijd werken op rest dagen in een maand, behalven als dit weekend dagen zijn. 
