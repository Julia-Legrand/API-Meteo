<?php

$ville = $_GET['ville'];

// Requête de l'API Openweather
$ApiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$ville&units=metric&appid=3006abddd1a4c34b4f25f8b01aee570f&lang=fr";

// Connexion au serveur avec Curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $ApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

// Fin de connexion
curl_close($ch);

// Décodage des données afin de les exploiter
$data = json_decode($response);

// Initialisation de la variable temps
// Définir le fuseau horaire
date_default_timezone_set('Europe/Paris');

// Créer un objet DateTime
$dateActuelle = new DateTime();

/// Choisir la localisation pour le français
$locale = 'fr_FR.utf8';
setlocale(LC_TIME, $locale);

// Obtenir la date et l'heure formatées
$currentTime = $dateActuelle->format('l j F Y H:i:s');

?>