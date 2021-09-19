<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meld je aan</title>
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
<?php
session_start();
?>
<!--Header-->
<div class="header">
    <img src="img/LogoDeSnoepKoning.png" alt=" " class="center" >
</div>

<!-- content -->
<div class="container text-center">
    <!--Home-->
    <div class="home">
        <a href="home.php"><i class="fas fa-home homeicon"></i></a>
    </div>

    <!--Winkelmandje-->
    <div class="winkelmandje">
        <a href="bestellen.php"><i class="fa fa-shopping-cart mandje"></i></a>
    </div>

    <div class="row">
        <div class="col-sm-6 login"><?php require 'login.php'?></div>
        <div class="col-sm-6 registreer"><?php require 'registreer.php' ?></div>
    </div>
</div>

<!--Footer-->
<?php  include "footer.html"; ?>

</body>
</html>
 