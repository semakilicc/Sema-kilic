<?php
require_once 'config.php';

$ID = $_GET['ID_Snoep'];

$query ="SELECT * FROM `dsk_snoep` WHERE ID_Snoep = ".$ID;

$resultaat = mysqli_query($mysqli, $query);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snoep koning</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/98fd0ad57d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="Style.css">
</head>
<style>
    body {
        background: /* top, transparent red, faked with gradient */
                linear-gradient(
                rgba(0, 0, 0, 0.66),
                rgba(0, 0, 0, 0.66)
        ),
            /* bottom, image */ url(img/achtergrond.jpg);
    }

    .header img{
        opacity: 0.5;
    }

    .opacity{
        background-color: rgba(255, 255, 255, 0.25);

    }

    .inner-container{
        border-radius: 5px;
        padding: 2.3%;
        width: 100%;
        height: 600px;
        background-color: white;
    }

</style>
<body>

<!--Header-->
<div class="header">
    <img src="img/LogoDeSnoepKoning.png" alt=" " class="center">
</div>

<?php

if(mysqli_num_rows($resultaat)==0){
echo "<p> Er is geen user met ID $ID</p>";
}
else {
    $row = mysqli_fetch_array($resultaat);
    ?>

    <!--Container-->
    <div class="container opacity">
        <div class="inner-container">

            <div class="row g-0">
                <a href="home.php"><button type="button"  class="btn-close" aria-label="Close"></button></a>

                <div class="col-md-4">

                    <?php
                    if(file_exists("upload/" .$row['Image'])) {
                        echo "<img src ='upload/" . $row['Image'] . "'class = 'rounded float-start' alt='...'/>";
                    }
                    else {
                        echo "<td>Geen afbeelding</td>";
                    } ?>
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $row['Naam']?></h1>

                        <h5 class="card-title">Bechrijving</h5>
                        <p class="card-text"><?php echo $row['Beschrijving']?></p>

                        <p>Inhoud: <?php echo $row['Inhoud']?></p>

                        <br>

                        <div class="price">
                            <span><?php echo $row['Prijs']?></span>
                            <a href="#" class="button">voeg toe <i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>

    </div>
</body>
</html>