<?php
session_start();
require_once('functions.php');

$pass=$_POST["pass"];
$cnx=getConnection();
$req=$cnx->prepare("select * from user where emailuser= :x1");
$req->bindParam(":x1", $login);
$login=$_POST["email"];
$req->execute();
$req->setFetchMode(PDO::FETCH_ASSOC);

if($req->rowcount()>0){
    $exist=0;
    while($d=$req->fetch()){

        if (password_verify($pass,$d["passworduser"]))
                 {
                    
                
                    $_SESSION["iduser"]=$d["iduser"];
                    $_SESSION["user"]=$d["prenomuser"]." ".$d["nameuser"];
                    $_SESSION["etat"]=$d["etatuser"];
                    $_SESSION["role"]=$d["role"];
                    
    $exist=1;
    header("location:accueil.php");
    }
    }
    
}
if($exist==0){
    $_SESSION["erreur"]="Merci pour votre connexion";
    $_SESSION["type_erreur"]="warning";
    header("location:connexion.php");
}

else {
    $date = date('Y-m-d H:i:s');
    $req=$cnx->prepare("update user set dateaccess = :a1 where iduser = :key ");
    $req->bindParam(":a1", $date);
    $req->bindParam(":key", $id);
    $id=$_SESSION["iduser"];
    $req->execute();
    $role=$_SESSION["role"];
    if($role==etudiant)
    {

    header("location:accueil.php");

    }else
    
    {
        header("location:gestion_livre.php");
    }

}
?>
    
