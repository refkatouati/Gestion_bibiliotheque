<?php
session_start();
require_once("functions.php");
$id_emprunt=$_GET["id"];
retouner($id_emprunt);
$livre=getLivreByIdEmprunt($id_emprunt);
foreach( $livre as $value){
$id_livre=$value->id_livre;
}
nbre_exemplaire_incrementé($id_livre);

header("location:mesemprunts.php?emprunt={$_SESSION["iduser"]}");