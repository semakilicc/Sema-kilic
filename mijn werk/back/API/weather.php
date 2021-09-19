<!DOCTYPE html>
<html lang="en">
<head>
    <title>Weather API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="opdracht1"><?php
$url = "https://api.openweathermap.org/data/2.5/weather?q=Rotterdam&lang=nl&appid=401b736f069d2ba444e0eb4ddab54cf3";


//Maak cURL handler
$ch = curl_init();

//Stel de opties in
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//Voer de cURL opdracht uit
$data = curl_exec($ch);

$bruikbaarOutput = json_decode($data);

//Toon de data op het scherm
?>
<div class='centered'>
    <div class="row">
        <div class="col-sm-9">
            <?php
            echo "Stad: " . $bruikbaarOutput->name;
            echo "<br>";
            echo "Land: " . $bruikbaarOutput->sys->country;
            echo "<br>";
            echo "GPS: " . $bruikbaarOutput->coord->lon . " " . $bruikbaarOutput->coord->lat;
            echo "<br>";
            echo "Tempratuur: " . $bruikbaarOutput->main->temp;
            echo "<br>";
            echo "Zonsopgang: " . $bruikbaarOutput->sys->sunrise;
            echo "<br>";
            echo "Zonsondergang: " . $bruikbaarOutput->sys->sunset;
            echo "<br>";
            echo "Windsnelheid: " . $bruikbaarOutput->wind->speed;
            echo "<br>";
            ?>
        </div>
        <div class="col-sm-3">
            <?php
            $icon = $bruikbaarOutput->weather[0]->icon;
            echo "<img src='http://openweathermap.org/img/wn/$icon@2x.png'>";

            $satellietfoto = "https://tile.openweathermap.org/map/temp_new/0/0/0.png?appid=401b736f069d2ba444e0eb4ddab54cf3";
            ?>
        </div>
    </div>
</div>
</body>
</html>
