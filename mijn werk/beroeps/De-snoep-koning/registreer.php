<?php
//CSRF TOKEN
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token;
?>
    <!--AANMELD form-->
    <form id="form" action="aanmeld.php" method="post">
        <h1>Meld je aan</h1>
        <label for="ID_Klant" class="col-sm-2 col-form-label"></label>
        <input type="text" name="ID_Klant" id="ID_Klant" class="form-control" placeholder="Gebruikersnaam">

        <label for="Naam" class="col-sm-2 col-form-label"></label>
        <input type="text" name="Naam" id="Naam" class="form-control" placeholder="Naam">

        <label for="Email" class="col-sm-2 col-form-label"></label>
        <input type="email" name="Email" id="Email" class="form-control" placeholder="E-mail">

        <label for="Wachtwoord" class="col-sm-2 col-form-label"></label>
        <input type="password" name="Wachtwoord" id="Wachtwoord" class="form-control" placeholder="Wachtwoord">

        <label for="Herhaal" class="col-sm-2 col-form-label"></label>
        <input type="password" name="Herhaal" id="Herhaal" class="form-control" placeholder="Wachtwoord herhaling">
        <br>
        <input type="hidden" name="csrf_token" value="<?php echo $token;?>">
        <button class="btn btn-primary" type="submit" id="submit" name="submit" style="background-color: #ff0054; border: none;">Aanmelden</button>
        <br>
        <!--AANMELD verwerk-->
        <?php include 'registreer_verwerk.php'; ?>
    </form>
