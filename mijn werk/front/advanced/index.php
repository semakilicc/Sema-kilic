<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recepten</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<div id="container">
    <?php require  'header.html' ?>
    <?php require 'nav.html' ?>
    <?php
    require 'config.php';

    $queryHG = "SELECT * FROM SK_recepten WHERE tag = 'HG'";

    $resultHG = mysqli_query($mysqli, $queryHG);

    if (mysqli_num_rows($resultHG) == 0){
        echo "Er zijn geen hoofdgerechten";
    }

    else{
        ?>
        <div id="content">
            <div id="home">
                <a id="hoofdgerecht"><h2>Hoofdgerechten</h2></a>
                <div id="hoofdgerechten">
                    <?php
                    while ($HG = mysqli_fetch_array($resultHG)){?>
                        <div class="img"><?php echo "<a href='gerecht.php?ID=".$HG['ID']."'><img src='". $HG['coverfoto'] ."' height='297' width='445'/><div class='overlay'><a>" .$HG['gerecht']. "</a></div> </a>"?></div>
                        <?php
                    }
                    ?>
                </div>
                <?php
                $queryBG = "SELECT * FROM SK_recepten WHERE tag = 'BG'";

                $resultBG = mysqli_query($mysqli, $queryBG);

                if (mysqli_num_rows($resultBG) == 0){
                    echo "Er zijn geen bijgerechten";
                }

                else{
                    ?>
                    <a id="bijgerecht"><h2>Bijgerechten</h2></a>
                    <div id="bijgerechten">
                        <?php

                        while ($BG = mysqli_fetch_array($resultBG)){?>
                            <div class="img "><?php echo "<a href='gerecht.php?ID=".$BG['ID']."'><img src='". $BG['coverfoto'] ."' height='297' width='445'/><div class='overlay'><a>" .$BG['gerecht']. "</a></div> </a>"?></div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }

                $queryG = "SELECT * FROM SK_recepten WHERE tag = 'G'";

                $resultG = mysqli_query($mysqli, $queryG);

                if (mysqli_num_rows($resultG) == 0){
                    echo "Er zijn geen Gebakjes";
                }

                else{
                    ?>
                    <a id="gebak"><h2>Gebakjes</h2></a>
                    <div id="gebakjes">
                        <?php
                        while ($G = mysqli_fetch_array($resultG)){?>
                            <div class="img"><?php echo "<a href='gerecht.php?ID=".$G['ID']."'><img src='". $G['coverfoto'] ."' height='297' width='445'/><div class='overlay'><a>" .$G['gerecht']. "</a></div> </a>"?></div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }

    require 'footer.html'
    ?>
</div>
</body>
</html>