<?php

include 'app.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appli Météo</title>

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Montserrat&display=swap" rel="stylesheet">

    <!--STYLES-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <img src="../Appli-Météo/images/oiseaux.gif" id="oiseaux" alt="oiseaux qui volent" style="position: absolute; top: 20; left: 0;" onclick="stopOiseauxAnimation()">
        <nav class="navbar navbar-light bg-light">
            <div class="bloc-left">
                <span class="navbar-brand mb-0 h1">Appli Météo</span>
            </div>
            <div class="bloc-right">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" name="ville" type="search" placeholder="Votre ville" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Chercher</button>
                </form>
            </div>
        </nav>
    </header>

    <main>

        <div class="report-container">
            <h1><?php echo isset($data->name) ? $data->name : 'Ville non trouvée'; ?></h1>
            <div class="time">
                <p style="font-size: 20px;"><?php echo $currentTime; ?></p>
            </div>

            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon">

            <div class="bloc">
                <?php
                if (isset($data->main)) {
                    echo "<span class='min-temperature'>Température maximum : " . $data->main->temp_max . "°C<br></span>";
                    echo "<span class='min-temperature'>Température minimum : " . $data->main->temp_min . "°C</span>";
                } else {
                    echo "Données météo non disponibles.";
                }
                ?>
            </div>

            <div class="bloc">Taux d'humidité : <?php echo $data->main->humidity; ?> %</div>

            <div class="bloc">Vitesse du vent : <?php echo $data->wind->speed; ?> km/h</div>
        </div>

    </main>

    <!--SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        let animationInterval; // Déclarer la variable pour stocker l'interval de l'animation
        let position = window.innerWidth; // Variable pour stocker la position des oiseaux

        function volOiseaux() {
            const oiseaux = document.getElementById('oiseaux');
            let vitesse = 8;
            let direction = -1; // Commencer en se déplaçant vers la gauche

            function deplacerOiseaux() {
                if (position <= 0 - oiseaux.width) {
                    oiseaux.style.right = window.innerWidth + 'px'; // Réinitialiser la position des oiseaux
                    position = window.innerWidth;
                } else {
                    position += vitesse * direction;
                    oiseaux.style.right = position + 'px';
                }
            }

            animationInterval = setInterval(deplacerOiseaux, 20);
        }

        window.onload = marcheOiseaux;
    </script>

</body>

</html>