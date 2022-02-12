<?php
include "db.php";
$title  = "add produit";
include "header.php";

if(!empty($_POST)){
    $stmt = $con->prepare("INSERT INTO `produits` (`id`, `name`, `prix`, `qte`) VALUES (NULL, :name, :prix, :qte)
    ");
    $stmt->execute($_POST); 
    $row = $stmt->rowCount();
    
    if($row > 0){
        echo "produit Added !!" ;
        header('Refresh: 3; URL=/web/produits.php');
    
    }


    exit;
}


?>
<div class="container " style="margin-top: 50px;">
    <h1> New Produits</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prix</label>
    <input type="numbre" name="prix" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Qte</label>
    <input type="numbre" name="qte" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
<?php include "footer.php";
?>


    
