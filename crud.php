<?php 

include_once("config.php");

$action=$_POST['action'];


if($action=='ajouter'){
    $reference= $_POST['reference'];
    $designation = $_POST['designation'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $req= "insert into produit values('$reference','$designation',' $prix','$quantite');";

    $res=mysqli_query($cnx,$req);
    header('Location:index.php');
}
elseif ($action == 'supprimer') {
    $reference = $_POST['reference'];
    $req = "DELETE FROM produit WHERE refprod='$reference';";
    //executer
    $res = mysqli_query($cnx, $req);
    header('Location:index.php');
    
} else{
    $reference = $_POST['reference'];
    $designation = $_POST['designation'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $req = "UPDATE produit SET refprod='$reference',Designation='$designation',prix=' $prix',Qts'$quantite' WHERE refprod='$reference';";

    $res = mysqli_query($cnx, $req);
    header('Location:index.php');

}
?>