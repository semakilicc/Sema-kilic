<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Veggie mac ‘n’ cheese</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<div id="container">
    <?php
    require  'header.html';
    require 'nav.html';

    require 'config.php';

    $ID = $_GET['ID'];

    $query = "SELECT * FROM SK_recepten WHERE ID = " . $ID;

    $result = mysqli_query($mysqli, $query);

    ?>
    <div id="content">
        <div id="recept">
            <?php
            if (mysqli_num_rows($result) == 0){
                echo "<p>Dit recept bestaat niet";
            }

            else{
            $row = mysqli_fetch_array($result);

            ?>
            <h1><?php echo $row['gerecht']; ?></h1>
            <table class="content-table">
                <thead>
                <tr>
                    <th>Ingrediënten (<?php echo $row['aantalpersonen']; ?> personen)</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $queryIngredient = "SELECT * FROM SK_ingredient WHERE recept = " . $row['ingredient'];
                $alleingredienten = mysqli_query($mysqli, $queryIngredient);

                if (mysqli_num_rows($alleingredienten) == 0){ ?>
                    <tr>
                    <td><?php echo "Dit gerecht heeft geen ingedriënten"; ?></td>
                    </tr>

                    <?php
                }

                else{
                    while ($ingredient = mysqli_fetch_array($alleingredienten)){ ?>
                        <tr>
                            <td><?php echo $ingredient['ingredient']; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <thead>
                <tr>
                    <th>Keukenspullen</th>
                </tr>
                </thead>
                <?php
                $queryKeukengerei = "SELECT * FROM SK_keukengerei WHERE recept = " . $row['keukengerei'];
                $alleSpullen = mysqli_query($mysqli, $queryKeukengerei);

                if (mysqli_num_rows($alleSpullen) == 0){ ?>
                        <tr>
                            <td><?php echo "Dit gerecht heeft geen keukenspullen"; ?></td>
                        </tr>
                    <?php
                }

                else{
                    while ($keukengerei = mysqli_fetch_array($alleSpullen)){ ?>
                        <tr>
                            <td><?php echo $keukengerei['keukengerei']; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>

            <div id="bereiden">
                <h2>Bereiden</h2>
                <p><?php echo $row['bereiding']; ?></p>
            </div>
            <iframe width="560" height="315" src="<?php echo $row['file']; ?>" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>

        </div>
    </div>
<?php
}
require 'footer.html';
?>
</div>
</body>
</html>