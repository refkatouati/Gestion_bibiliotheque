<?php
require_once("functions.php");
$id=$_GET["id"];
deleteLivre($id);
header("location:gestion_livre.php");