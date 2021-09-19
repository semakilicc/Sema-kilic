<!DOCTYPE html>
<html lang="en">
<head>
    <title>FilmTotaal API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="opdracht2">
<?php
$token = "4xcz76aypmvszyyplf92npz4itk9kg3y";
$date = date('d-m-Y', strtotime(date('d-m-Y') . '+1 day'));

$url = "http://api.filmtotaal.nl/filmsoptv.xml?apikey=$token&dag=$date&sorteer=0";

//Maak cURL handler
$ch = curl_init();

//Stel de opties in
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//Voer de cURL opdracht uit
$data = curl_exec($ch);

curl_close($ch);

$filmdata = new SimpleXMLElement($data);

?>
<div class="container">
        <?php
        foreach ($filmdata->film as $film){
        ?>
        <div class="row content">
            <!-- Cover image -->
            <div class='col-sm-3'>
                <img src='<?php echo $film->cover ?>' width='100%'>
            </div>

            <!-- Film info -->
            <div class='col-sm-9' style="margin-bottom: 10px">
                <!-- Naam + Jaar -->
                <div class="row naam">
                        <h5><?php echo $film->titel?></h5> <a><?php echo $film->jaar?></a>
                </div>
                <br>
                <!-- Details + Air info + Genre -->
                <div class="row details">
                    <div class="col">
                        <h6>Details</h6>
                        <?php
                        echo "<span class='d-block'> Land: ";
                        $landen = explode(':', $film->land);
                        foreach ($landen as $land){
                            echo $land . " ";
                        }
                        echo "</span>";
                        ?>
                        <span class='d-block'>Regisseur: <?php echo $film->regisseur?></span>
                    </div>
                    <div class="col">
                        <h6>Air Info</h6>
                        <span class='d-block'>Duur: <?php echo $film->duur?> min</span>
                        <span class='d-block'>Zender: <?php echo $film->zender?></span>
                    </div>
                    <div class="col">
                        <?php
                        echo "<span class='d-block'>Genre:  ";
                        $genres = explode(':', $film->genre);
                        foreach ($genres as $genre){
                            echo $genre . ", ";
                        }
                        echo "</span>";

                        ?>
                    </div>
                </div>
                <br>
                <!-- Synopsis + cast + rating -->
                <div class="row overig">
                    <h6>Synopsis</h6>
                    <span class="d-block"><?php echo $film->synopsis ?></span>

                    <h6>Cast</h6>
                    <?php
                    echo "<span class='d-block'>";
                    $casts = explode(':', $film->cast);
                    foreach ($casts as $cast){
                        echo $cast . ", ";
                    }
                    echo "</span>";

                    ?>
                    <h6>Rating IMDB</h6>
                    <span>&#9733 <?php echo $film->imdb_rating ?> door <?php echo $film->imdb_votes ?> stemmers</span>
                </div>
            </div>
        </div>
            <?php
        }
        ?>
</div>
</body>
</html>