<?php
require_once 'config.php';

$query ="SELECT * FROM `dsk_snoep`";

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

    <!--Profiel-->
    <div class="profiel">
        <a href="profiel.php"><i class="fas fa-user-alt user"></i></a>
    </div>

    <!--Winkelmandje-->
    <div class="winkelmandje">
        <a href="bestellen.php"><i class="fa fa-shopping-cart mandje"></i></a>
    </div>

    <!--Banner-->
    <div class="banner">
        <img src="img/banner.jpg" alt=" " class="banner-img">
    </div>

    <!--Candy Card-->
    <div class="row">
        <?php
        if (mysqli_num_rows($resultaat) > 0) {
            while ($row = mysqli_fetch_array($resultaat)) {
                ?>

                <div class="mb-2 row card" style="width: 20rem;" >

                    <?php
                    if(file_exists("upload/" .$row['Image'])) {
                        echo "<a href='modal.php?ID_Snoep=".$row['ID_Snoep']."'><img src ='upload/" . $row['Image'] . "'class = ' view-data card-img-top ' alt='...'/></a>";
                    }
                    else
                    {
                        echo "<td>Geen afbeelding</td>";
                    }
                    ?>
                    <input type="hidden" name="ID_Snoep" value="<?php echo $row['ID_Snoep'] ; ?>" class="view-data">


                    <div class="card-body">
                        <h5 class="card-title">
                            <strong><?php echo  $row['Naam']?></strong>
                        </h5>

                        <div class="price">
                            <span><?php echo $row['Prijs']?></span>
                            <a href="" class="button" onclick="voegtoe()">voeg toe <i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            <?php }}

        ?>
    </div>
</div>

<!--Footer-->
<?php  include "footer.html"; ?>
<script src="winkelwagen.js"></script>


</body>
</html>