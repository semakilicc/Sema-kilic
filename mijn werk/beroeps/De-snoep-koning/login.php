<?php
if (isset($_POST['inlog'])){

    require 'config.php';

    $ID_Klant = $_POST['ID_Klant'];
    $Wachtwoord = sha1($_POST['Wachtwoord']);

    $query = "SELECT * FROM dsk_besteller WHERE ID_Klant = '$ID_Klant' AND Wachtwoord = '$Wachtwoord'";

    $resultaat = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($resultaat) >0){
        $user = mysqli_fetch_array($resultaat);

        $_SESSION['ID_Klant'] = $user['ID_Klant'];

        header("Location:profiel.php");
        exit;
    }

    else{
            header("Location:aanmeld.php");
            exit;
    }

}

else{
    ?>
            <form method="post" action="">
                <h1>Log in</h1>
                <label for="Gebruikersnaam" class="col-sm-2 col-form-label"></label>
                <input type="text" class="form-control" placeholder="Gebruikersnaam" name="ID_Klant" required="" autofocus="">

                <label for="Wachtwoord" class="col-sm-2 col-form-label"></label>
                <input type="password" class="form-control" placeholder="Wachtwoord"  name="Wachtwoord" required="">
                <br>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Onthoud mij
                    </label>
                </div>
                <button class="btn btn-primary" type="submit" id="submit" name="inlog" style="background-color: #ff0054; border: none;">Log in</button>

            </form>
    <?php
}
?>
