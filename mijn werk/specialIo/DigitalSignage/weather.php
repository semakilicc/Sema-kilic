<?php
$url = "https://api.openweathermap.org/data/2.5/weather?q=Rotterdam&&units=metric&lang=nl&appid=401b736f069d2ba444e0eb4ddab54cf3";


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
echo "<table>";
echo "<p class='weatherName'>" . $bruikbaarOutput->name . "</p>";
echo "<tr>";
$icon = $bruikbaarOutput->weather[0]->icon;
echo "<td style='padding-left: 20px;'><img src='http://openweathermap.org/img/wn/$icon@2x.png' style='width: 70px;'></td>";
echo  "<td>" . $bruikbaarOutput->weather[0]->main . " " . $bruikbaarOutput->main->temp . " °C </td>";
echo "</tr>";
echo "</table>";
