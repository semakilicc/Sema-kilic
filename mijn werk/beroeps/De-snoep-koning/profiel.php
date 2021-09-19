<?php
require 'session.php';
require 'config.php';
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token;

$ID_Klant = $_SESSION['ID_Klant'];

$query = "SELECT * FROM dsk_besteller WHERE ID_Klant = '$ID_Klant'" ;

$resultaat = mysqli_query($mysqli, $query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profiel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/98fd0ad57d.js" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>

    <link rel="stylesheet" href="Style.css">
</head>
<body>
<!--Header-->
<div class="header">
    <img src="img/LogoDeSnoepKoning.png" alt=" " class="center" >
</div>

<!--Container-->
<div class="container">
    <!--Home-->
    <div class="home">
        <a href="home.php"><i class="fas fa-home homeicon"></i></a>
    </div>

    <!--Winkelmandje-->
    <div class="winkelmandje">
        <a href="bestellen.php"><i class="fa fa-shopping-cart mandje"></i></a>
    </div>

    <div class="row">
        <div class="profielpage">
            <?php if (mysqli_num_rows($resultaat) == 0){
                echo "<p>$ID_Klant niet gevonden.</p>";
            }

            else {
                $rij = mysqli_fetch_array($resultaat);?>
                <form id="profiel_form" action="profiel.php" method="post">
                <h2><?php echo $rij ['Naam'];?></h2>
                <h3>Wijzig gegevens</h3>
                <div class="mb-3 row">
                    <label for="ID_Klant" class="col-sm-2 col-form-label">Gebruikersnaam</label>

                    <div class="col-sm-10">
                        <input type="text" name="ID_Klant" id="ID_Klant" class="input_profiel form-control" value="<?php echo $rij ['ID_Klant'] ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="Naam" class="col-sm-2 col-form-label">Naam</label>

                    <div class="col-sm-10">
                        <input type="text" name="Naam" id="Naam" class="input_profiel form-control" value="<?php echo $rij ['Naam'] ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="Email" class="col-sm-2 col-form-label">E-mail</label>

                    <div class="col-sm-10">
                        <input type="email" name="Email" id="Email" class=" input_profiel form-control" value="<?php echo $rij ['Email'] ?>">
                    </div>
                </div>

                <h3>Adres</h3>

                <div class="mb-3 row">
                    <label for="Adres" class="col-sm-2 col-form-label">Adres</label>

                    <div class="col-sm-10">
                        <input type="text" name="Adres" id="Adres" class=" input_profiel form-control" value="<?php echo $rij ['Adres'] ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="Woonplaats" class="col-sm-2 col-form-label">Woonplaats</label>

                    <div class="col-sm-10">
                        <input type="text" name="Woonplaats" id="Woonplaats" class=" input_profiel form-control" value="<?php echo $rij ['Woonplaats'] ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="PostCode" class="col-sm-2 col-form-label">Postcode</label>

                    <div class="col-sm-10">
                        <input type="text" name="PostCode" id="PostCode" class=" input_profiel form-control" value="<?php echo $rij ['PostCode'] ?>">
                    </div>
                </div>

                <input type="hidden" name="csrf_token" value="<?php echo $token;?>">
                <input type="submit" name="submit" id="submit" value="Opslaan" class="btn btn-primary" style="background-color: #ff0054; border: none;">
                <a href="loguit.php"><button type="button" class="btn btn-secondary">Uitloggen</button></a>

                <?php
                echo "<a href = 'ww_wijzig.php?ID_Klant=" . $rij['ID_Klant'] . "' style='float: right'><button type='button' class='btn btn-secondary'>Wijzig wachtwoord</button></a>";
                ?>

                <?php include 'profiel_verwerk.php'?>
                </form><?php
            }?>
        </div>
    </div>
</div>

<!--Footer-->
<?php  include "footer.html"; ?>

</body>
</html>
