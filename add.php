<?php
require_once("functions.php");
$titre=$_GET["titre"];
$auteur=$_GET["auteur"];
$nbre_exp=$_GET["nbre"];
addLivre($titre,$auteur,$nbre_exep);
header("location:gestion_livre.php");
?>