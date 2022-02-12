<?php
include "db.php";
include "header.php";

$stmt = $con->prepare("SELECT * FROM produits");
$stmt->execute(); 
$produits = $stmt->fetchall();
echo "<pre>";
var_dump($produits);

include "footer.php";
?>


    
