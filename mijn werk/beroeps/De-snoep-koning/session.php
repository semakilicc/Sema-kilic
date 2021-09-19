<?php
session_start();
if (!isset($_SESSION['ID_Klant'])){
    header("location:aanmeld.php");
    exit;
}
?>