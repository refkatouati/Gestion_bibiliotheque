<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap/css/bootstrap.min.css"  rel="stylesheet" >
    </head>
    <body>
<div class="well">
    <h1>GESTION DES LIVRES</h1>
</div>

<div class="col-md-12">
    <form method="get" action="add.php">
        <div class="form-group">
            <label>Titre</label>
            <input type="text" class="form-control" name="titre" placeholder="
            titre">
        </div>
        <div class="form-group">
            <label>Auteurs</label>
            <input type="text" class="form-control" name="Auteurs" placeholder="
            Auteurs">
        </div>
        <div class="form-group">
            <label>Nombre d'exemplaires</label>
            <input type="text" class="form-control" name="nbre" placeholder="
            Nombre d'exemplaires">
        </div>
        
  <div class="form-group">
                        <label>Categorie</label>
                        <select name="idcat" class="form-control">

                    <?php
                    $liste1= getAllCategories();
                    foreach($liste1 as $value) {
                    ?>
                  <option value= "<?=$value->id?>" ><?=$value->titre ?></option>
                            
                     <?php
                      } ?>
                             </select>
                    </div>
  
  
        <div class="form-group">
            <label>Image</label>
            <?php
            $file=fopen('image','r');
            ?>
        </div>
        
        <button type="submit" class="btn btn-default">Enregistrer</button>
            </form>
</div>

    </body></html>