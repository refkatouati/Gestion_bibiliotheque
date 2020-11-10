
<?php
session_start();
require_once("functions.php");
$id_livre=$_GET["id"];
$id_etd=$_SESSION["iduser"];
emprunter($id_etd,$id_livre);
nbre_exemplaire_decremente($id_livre);
header("location:accueil.php");