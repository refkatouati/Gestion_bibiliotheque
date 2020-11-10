<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.min.css"  rel="stylesheet" >
</head>
<body>
<div class="container">

    <div class="row" style="margin-top:80px;">
        <div class="col-md-6 col-md-offset-3">

            <div class="well">
                <p ><h1 style="text-align:center">Connexion - BiblioESSAT - </h1></p>
                <br>
                <form method="POST" action="verif.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adresse Email</label>
                        <input name="email" type="email" class="form-control"  placeholder="Votre Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input name="pass" type="password" class="form-control"  placeholder=" Votre Mot de passe">
                    </div>
                    <button type="submit" class="btn btn-default">Se Connecter</button>
                </form>
            </div>

           
        </div>

    </div>


</body>
</html>