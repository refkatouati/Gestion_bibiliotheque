<?php
session_start();
require_once("functions.php");
if(!isset($_SESSION["user"])){
    header("location:connexion.php");
}
    
               ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.min.css"  rel="stylesheet" >
</head>
<body>


<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">          
            <a class="navbar-brand" href="#"> Admin-Bilbio-ESSAT </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="gestion_livre.php">Gestion des Livres</a></li>
                <li class=""><a href="gestion_user.php?">Gestion des utilisateurs</a></li>
                <li class=""><a href="etat_empruntk.php?">Etat des Emprunts</a></li>

            </ul>
			
            <div>
            <div class="nav navbar-nav navbar-right">          
            <a  class="navbar-brand" href=""><?=$_SESSION["user"]?></a><a  class="navbar-brand" href="dec.php">(Deconnexion)</a>
        </div>      
               


        </div>
    </div>
</nav>
<br/>
<div class="row" style="margin-top: 30px">

        <div class="col-md-12">
          <h1>Liste des Livres</h1>
        </div>
        <div class="col-md-6">
            <a  href="ajouter.php" class="btn btn-primary" >
            
                Ajouter un livre

            </a>

        </div>
        
    </div>
    <div class="col-md-12" style="margin-top: 20px">

<table class="table table-striped table-bordered">
    <thead>
    <tr><th style="width:90px">#</th><th>Titre</th><th>Auteurs</th><th>Exemplaires</th></tr>
    </thead>
    <tbody> 
   <?php
   $livre= getAllLivres();
    foreach($livre as $liv)
    {
    ?>               
        <tr>
            <td> <img src="images/<?=$liv->id ?>.png" width="80%" >    </td>
      
            <td><?= $liv->titre?></td>
            <td><?= $liv->auteurs?></td>
            <td><?= $liv->nbre_exemplaires?></td>
            <?php 
            if (($liv->nbre_exemplaires)>0){
                echo"<td>";
                echo"<a href='modifier.php?id=$liv->id' class='btn btn-success'>";
                echo"Modifier";
                echo"</a>";
                echo"<a href='delete.php?id=$liv->id' class='btn btn-danger'>";
                echo"Supprimer";
                echo"</a>";
                echo"</td>";
                
            }
        
                ?>
           
        </tr>
    <?php
    }
    ?>          
    </tbody>
</table>


</div>


</body>
</html>