
  <?php
   session_start();
require_once("functions.php");
if(!isset($_SESSION["user"])){
    header("location:connexion.php");

}
$categorie=null;
if(isset($_GET["id"])){
    $livre=getLivreByCat($_GET["id"]);
}elseif(isset($_GET["mot"])){
    $livre=Recherche($_GET["mot"]);

}
elseif(isset($_GET["emprunt"])){
    $emprunt=getMesEmprunts($_GET["emprunt"]);
    
}else{
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
                <li class=""><a href="accueil.php">Home</a></li>
                <li class="active"><a href="1"=<?=$_SESSION["iduser"]?>">Mes emprunts</a></li>
            </ul>
			<form class="navbar-form navbar-left" method="get"  >
				<div class="form-group">
					<input type="text" name="mot" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Chercher</button>
			</form>
            
            <div class="nav navbar-nav navbar-right">          
            <a  class="navbar-brand" href=""><?=$_SESSION["user"]?></a><a  class="navbar-brand" href="dec.php">(Deconnexion)</a>
        </div>
        </div>
    </div>
   
</nav>


<div class="container">
 
    <div class="row" style="margin-top: 80px;">
	
       <div class="col-md-3">
			<div class="row">
				<div class="list-group">
					<a href="accueil.php" class="list-group-item active">Categorie</a>
                    <?php
                    
                    $categorie=getAllCategories();
                    foreach( $categorie as $value)

                     {
                        echo "<a href='accueil.php?id={$value->id}' class='list-group-item'>{$value->titre}</a>"; 
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
                <h1>Mes Livres empruntés</h1>   
                <hr/>
                <?php 
                if(isset($emprunt)){
                        
                        $emprunt=getMesEmprunts($_GET["emprunt"]);
                    
                    foreach( $emprunt as $value)
                   
                     {
                         $livre=getLivreById($value->id_livre);
                         foreach($livre as $value1)
                       {
                       ?>

                    
                    <tr>
                        <td> <img src="images/<?=$value1->id ?>.png" width="80%" >    </td>
                        <td> <?=$value1->titre?></td>
                        <td><?=$value1->auteurs?></td>
                        <td><a href="retourner.php?id=<?=$value->id?>" class="genric-btn warning radius">Retourner</a></td>
                        
                    </tr>
                    <?php
                     }
                     }
                     }
                     ?>        
                </tbody>
            </table>


        </div>

    </div>

</div>


</body>
</html>