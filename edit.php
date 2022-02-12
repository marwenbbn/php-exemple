<?php
include "db.php";
$title  = "edit produit";
include "header.php";

if(!empty($_POST)){
    $stmt = $con->prepare("UPDATE `produits` SET `name` = :name, `prix` = :prix, `qte` = :qte WHERE `produits`.`id` = :id");
    $stmt->execute($_POST); 
    $row = $stmt->rowCount();
    
    if($row > 0){
        echo "produit Edited !!" ;
        header('Refresh: 3; URL=/web/produits.php');
    
    }


    exit;
}else{
    $stmt = $con->prepare("SELECT * FROM produits WHERE id = ?");
    $stmt->execute(array($_GET["id"])); 
    $pro = $stmt->fetch();
}


?>
<div class="container " style="margin-top: 50px;">
    <h1> New Produits</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name" value="<?php echo $pro["name"]; ?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prix</label>
    <input type="numbre" name="prix"  value="<?php echo $pro["prix"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Qte</label>
    <input type="numbre" name="qte"  value="<?php echo $pro["qte"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <input type="hidden" name="id" value="<?php echo $pro["id"]; ?>" >
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
<?php include "footer.php";
?>


    
