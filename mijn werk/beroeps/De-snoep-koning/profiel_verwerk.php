<?php
    //VERIFIEER DE IDENTITEIT VAN HET FORMULIER
    if (isset($_POST['submit'])) {
        //CSRF TOKEN
        if (!isset($_SESSION["token"]) && $_SESSION["token"] == $_POST["csrf_token"]){
            echo "Er ging iets fout, probeer opnieuw";
        }
        else {
            require 'config.php';

            $ID_Klant = htmlentities($_POST['ID_Klant'], ENT_QUOTES);
            $Naam = $_POST['Naam'];
            $Adres = $_POST['Adres'];
            $Woonplaats = $_POST['Woonplaats'];
            $PostCode = $_POST['PostCode'];
            $Email = $_POST['Email'];
            $patroonPostCode = "/[1-9][0-9]{3} [A-Z]{2}/";


            $query = "UPDATE dsk_besteller 
                            SET ID_Klant = '$ID_Klant', Naam = '$Naam', Adres = '$Adres', Woonplaats = '$Woonplaats', PostCode = '$PostCode', Email = '$Email', rechten = '0'
                            WHERE ID_Klant = '$ID_Klant'";

            //Post code validatie
            if (!preg_match($patroonPostCode, $_POST['PostCode']) == 1) {
                echo "Voer een geldige post code in";
            }

            //E-mail valitatie
            elseif (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
                echo "Gebruik een geldige e-mail";
            }

            else {
                if (mysqli_query($mysqli, $query)) {
                    echo "<p><b>$ID_Klant</b> is aangepast!.</p>";
                }
                else {
                    echo "Er ging iets fout, probeer opnieuw";
                    echo mysqli_error($mysqli);
                }

            }

        }

    }

