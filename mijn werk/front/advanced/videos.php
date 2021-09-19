<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Video's</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<div id="container">
    <?php require  'header.html' ?>
    <?php require 'nav.html' ?>
    <?php
    require 'config.php';

        $queryVI = "SELECT * FROM SK_recepten WHERE video = 1";

    $resultVI = mysqli_query($mysqli, $queryVI);

    if (mysqli_num_rows($resultVI) == 0){
        echo "Er zijn geen recepten met video";
    }

    else{
        ?>
    <div id="content">
        <div id="home">
            <h2>Recepten met video's</h2>
            <div id="videos">
                <?php
                while ($VI = mysqli_fetch_array($resultVI)){?>
                    <div class="img"><?php echo "<a href='gerecht.php?ID=".$VI['ID']."'><img src='". $VI['coverfoto'] ."' height='297' width='445'/><div class='overlay'><a>" .$VI['gerecht']. "</a></div> </a>"?></div>
                    <?php
                }
                ?>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php require 'footer.html' ?>
</div>
</body>
</html>