<html>
<head>
    <title>Admin</title>
</head>
<body>
<?php
//session_start();
require 'session.php';

if ($_SESSION['rechten'] == 0){
    header("location:home.php");
//    echo "<p>U heeft geen rechten om deze pagina te bekijken.</p>";
//    echo "<p><button><a href='home.php'>Ga terug</a></button></p>";
//    exit();

}
else{

    require 'config.php';

    $query = "SELECT * FROM dsk_besteller";

    $resultaat = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($resultaat) == 0){
        echo "<p>Er ging iets mis</p>";
    }

    else{?>
        <div id="content">
            <div>
                <h2>Klanten:</h2>
                <form>
                    <table>
                        <thead>
                        <td>ID_Klant:</td>
                        <td>Naam:</td>
                        <td>Adres:</td>
                        <td>Woonplaats:</td>
                        <td>Post code:</td>
                        <td>E-mail:</td>
                        </thead>


                        <?php while ($rij = mysqli_fetch_array($resultaat)){?>
                            <tbody>
                        <tr>
                            <td><?php echo $rij['ID_Klant'];?></td>
                            <td><?php echo $rij['Naam'];?></td>
                            <td><?php echo $rij['Adres'];?></td>
                            <td><?php echo $rij['Woonplaats'];?></td>
                            <td><?php echo $rij['PostCode'];?></td>
                            <td><?php echo $rij['Email'];?></td>
                        </tr>
                            </tbody><?php
                        }?>

                    </table>
                </form>
            </div>
        </div>
        <?php
    }
}
?>
</body>
</html>