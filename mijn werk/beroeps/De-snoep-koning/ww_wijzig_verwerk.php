<?php
    //VERIFIEER DE IDENTITEIT VAN HET FORMULIER
    if (isset($_POST['submit'])) {
        //CSRF TOKEN
        if (!isset($_SESSION["token"]) && $_SESSION["token"] == $_POST["csrf_token"]){
            echo "Er ging iets fout, probeer opnieuw";
        }
        else {
            require 'config.php';

            $Wachtwoord = sha1 ($_POST['Wachtwoord']);
            $Herhaal = sha1 ($_POST['Herhaal']);
            $Groteletter = "/[A-Z]/";
            $Kleineletter = "/[a-z]/";
            $Nummer = "/[0-9]/";
            $Specialeteken = "/[!@#$%^&*_?\w]/";

            if($Wachtwoord == $Herhaal){
                $query = "UPDATE dsk_besteller 
                            SET Wachtwoord = '$Wachtwoord', Herhaal = '$Herhaal'
                            WHERE ID_Klant";


                //Lege velden check
                if (empty($Wachtwoord) && empty($Herhaal)){
                    echo "één of meerdere velden zijn nog niet ingevuld";
                }

                //Wachtwoord validatie

//                elseif (!preg_match($Groteletter, $Wachtwoord)){
//                    echo "Wachtwoord moet tenminste voeldoen aan 1 grote letter";
//                }
                elseif (!preg_match($Kleineletter, $Wachtwoord)){
                    echo "Wachtwoord moet tenminste voldoen aan 1 kleine letter";
                }
                elseif (!preg_match($Nummer, $Wachtwoord)){
                    echo "Wachtwoord moet tenminste voldoen aan 1 getal";
                }
                elseif (!preg_match($Specialeteken, $Wachtwoord)){
                    echo "Wachtwoord moet tenminste voldoen van 1 speciale teken";
                }
                elseif (strlen($Wachtwoord) < 8){
                    echo "Wachtwoord moet tenminste 8 groot zijn";
                }


                else {
                    if (mysqli_query($mysqli, $query)) {
                        echo "<p>Wachtwoord is gewijzigt</p>";

                    }
                    else {
                        echo "Er ging iets fout, probeer opnieuw";
                        echo mysqli_error($mysqli);
                    }

                }
            }

            else{
                echo "Wachtwoorden komen niet overeen!";
            }
        }

    }