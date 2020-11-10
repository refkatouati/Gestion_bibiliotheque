<?php
session_start();
require_once("functions.php");
if(!isset($_SESSION["user"])){
    header("location:connexion.php");
}
     $categories=null;
               
               
     if(isset($_GET["mot"]))
               {
               
               $livre=Find($_GET["mot"]);
               
               }
               else{
               
               $livre= getAllLivres();
               
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
            <a class="navbar-brand" href="#">Bilbio-ESSAT </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="accueil.php">Home</a></li>
                <li class=""><a href="mesemprunts.php?emprunt=<?=$_SESSION["iduser"]?>">Mes emprunts</a></li>

            </ul>
			<form class="navbar-form navbar-left" method="get" action="accueil.php" >
				<div class="form-group">
					<input type="text" name="mot" class="form-control" placeholder="Search">
                   
				</div>
				<button type="submit" class="btn btn-default">Chercher</button>
			</form>
            <div>
            <div class="nav navbar-nav navbar-right">          
            <a  class="navbar-brand" href=""><?=$_SESSION["user"]?></a><a  class="navbar-brand" href="dec.php">(Deconnexion)</a>
        </div>
            
               


        </div>
    </div>
</nav>
<br/>

<div class="container">

    <div class="row" style="margin-top: 80px;">
	
       <div class="col-md-3">
			<div class="row">
				<div class="list-group">
					<a href="accueil.php" class="list-group-item active">Catégorie</a>
                    <?php
                   require_once("functions.php");
                    $categories=getAllCategories();
                    foreach($categories as $cats)
                    {
                       ?>    
                   
                    <a href='accueil.php?id=$cats->id' class='list-group-item '> <?=$cats->titre?></a>
                   
                   <?php
                    }
                 
					
                    ?>
				</div>
			</div>
			
			
        </div>
		
        <div class="col-md-9">

            <table class="table table-striped table-bordered">
                <thead>
                <tr><th style="width:90px">#</th><th>Titre</th><th>Auteurs</th><th>Exemplaires</th></tr>
                </thead>
                <tbody> 
               <?php
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
                            echo"<a href='emprunter.php?id=$liv->id' class='btn btn-info'>";
                            echo"Emprunter";
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

    </div>

</div>


</body>
</html>