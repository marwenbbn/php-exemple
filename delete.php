<?php
include "db.php";
$title  = "delete produit";
include "header.php";

$id = $_GET['id'];
$stmt = $con->prepare("DELETE FROM `produits` WHERE `produits`.`id` = ? ");
$stmt->execute(array($id)); 
$row = $stmt->rowCount();

if($row > 0){
    echo "produit deleted !!" ;
    header('Refresh: 3; URL=/web/produits.php');

}
include "footer.php";
?>


    
