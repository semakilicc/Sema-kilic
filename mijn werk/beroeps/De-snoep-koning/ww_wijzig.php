<?php
require 'session.php';
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token;
require 'config.php';

$ID_Klant = $_SESSION['ID_Klant'];

$query = "SELECT * FROM dsk_besteller WHERE ID_Klant= '$ID_Klant'" ;

$resultaat = mysqli_query($mysqli, $query);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Profiel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snoep koning</title>

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
    <a href="home.php"><img src="img/LogoDeSnoepKoning.png" alt=" " class="center" ></a>
</div>

<!--Content-->
<div  class="container">
    <div class="row">
        <div class="profielpage">
            <?php if (mysqli_num_rows($resultaat) == 0){
                echo "<p>$ID_Klant niet gevonden.</p>";
            }

            else {
                $rij = mysqli_fetch_array($resultaat);?>
                <form id="profiel_form" action="ww_wijzig.php" method="post">
                <h2><?php echo $rij ['Naam'];?></h2>
                <h3>Wijzig wachtwoord</h3>
                <div class="mb-3 row">
                    <label for="Wachtwoord" class="col-sm-2 col-form-label">Wachtwoord</label>

                    <div class="col-sm-10">
                        <input type="password" name="Wachtwoord" id="Wachtwoord" class="input_profiel form-control" value="<?php echo $rij ['Wachtwoord'] ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Herhaal" class="col-sm-2 col-form-label">Wachtwoord herhaling</label>

                    <div class="col-sm-10">
                        <input type="password" name="Herhaal" id="Herhaal" class="input_profiel form-control" value="<?php echo $rij ['Herhaal'] ?>">
                    </div>
                </div>
                <input type="hidden" name="csrf_token" value="<?php echo $token;?>">
                <button onclick="history.back();return false;" class="btn btn-secondary">Ga terug</button>
                <input type="submit" name="submit" id="submit" value="Wijzig" class="btn btn-primary" style="background-color: #ff0054; border: none;">

                <?php include 'ww_wijzig_verwerk.php'; ?>
                </form><?php
            }?>

        </div>
    </div>
</div>

<!--Footer-->
<?php  include "footer.html"; ?>

</body>
</html>

