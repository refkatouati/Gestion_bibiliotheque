<?php
function getConnection(){
    $cnx= new PDO("mysql:host=localhost;dbname=biblio","root","");
    return $cnx;
}
function getAllCategories(){
    $db=getConnection();
    $req=$db->query("select * from categorie");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
        $tab[]=$ligne;

    }
    return $tab;
    
}

function getAlllivreByIdCat($id_cat)
{
    $db=getConnection();
    $req=$db->query("select * from Livre where id_cat= ?");
    $req->bindParam(1,$id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
        $tab[]=$ligne;

    }
    return $tab;
}
    
function getAllLivres()
{
    $cnx=getConnection();
    $req=$cnx->query("select * from livre");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=[];
while($ligne=$req->fetch())
{
    $tab[]=$ligne;
}
return $tab;
}
function getLivreById($id)
{ $cnx=getConnection();
    $req=$cnx->prepare("select * from livre where id=?");
	 $req->bindParam(1,$id);
    $req->execute();
   
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=[];
    while($ligne=$req->fetch())
    {
        $tab[]=$ligne;
    }
    return $tab;

}
function Find($mot)
{
    $cnx=getConnection();
    $req=$cnx->query("select * from livre where titre like '%$mot%' ");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=[];
    while($ligne=$req->fetch())
{
    $tab[]=$ligne;
}
return $tab;
}
function emprunter($id_etd,$id_livre){
    $db=getConnection();
    $date = date('Y-m-d H:i:s');
    $req=$db->prepare("insert into emprunt values(null,?,?,?,1)");
    $req->bindParam(1,$id_etd);
    $req->bindParam(2,$id_livre);
    $req->bindParam(3,$date);
    $req->execute();
   
}
function nbre_exemplaire_decremente($id_livre){
    $db=getConnection();
    $req=$db->prepare("update livre set nbre_exemplaires= nbre_exemplaires-1 where id=:var1  ");
    $req->bindParam(":var1",$id_livre);
    $req->execute();
   
}


function retouner($id_emprunt){
    $db=getConnection();
    $req=$db->prepare("update emprunt set etat_emprunt=0 where id=:var1");
    $req->bindParam(":var1",$id_emprunt);
    $req->execute();
   
}
function nbre_exemplaire_incremente($id_livre){
    $db=getConnection();
    $req=$db->prepare("update livre set nbre_exemplaires= nbre_exemplaires+1 where id=:var1  ");
    $req->bindParam(":var1",$id_livre);
    $req->execute();
   
}
function getMesEmprunts($id){
    $db=getConnection();
    $req=$db->prepare("select* from emprunt where id_etd=:var1 and etat_emprunt=1");
    $req->bindParam(":var1",$_SESSION["iduser"]);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
    $tab[]=$ligne;
    }
    return $tab;
}
function getLivreByIdEmprunt($id_emprunt){
    $db=getConnection();
    $req=$db->prepare("select id_livre from emprunt where id=?");
    $req->bindParam(1,$id_emprunt);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
    $tab[]=$ligne;
    }
    return $tab;
}
function deleteLivre($id)
{
    $db=getConnection();
    $stm=$db->prepare("delete from livre where id=?");
    $stm->bindParam(1,$id);
    $stm->execute();

}
function addLivre($titre,$auteur,$nbre_exemplaires)
{
    $db=getConnection();
    $stm=$db->prepare("insert into livre values(null,?,?,?)");
    $stm->bindParam(1,$titre);
    $stm->bindParam(1,$auteur);
    $stm->bindParam(3,$nbre_exemplaires);

    $stm->execute();
}

