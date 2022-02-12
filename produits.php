<?php 
include "db.php";

$stmt = $con->prepare("SELECT * FROM produits");
$stmt->execute(); 
$produits = $stmt->fetchall();
$title  = "produits";
include "header.php";



?>

<div class="container " style="margin-top: 50px;">
    <h1>Produits <a href="add.php" class="btn btn-primary">ADD</a></h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">prix</th>
          <th scope="col">qte</th>
          <th scope="col">edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($produits as $pro){ ?> 
        <tr>
          <td><?php echo $pro["id"]; ?></td>
          <td ><?php echo $pro["name"]; ?></td>
          <td><?php echo $pro["prix"]; ?></td>
          <td><?php echo $pro["qte"]; ?></td>
          <td><a href="edit.php?id=<?php echo $pro["id"]; ?>" class="btn btn-warning">Edit</a></td>
          <td><a href="delete.php?id=<?php echo $pro["id"]; ?>" class="btn btn-danger">Delete</a>
</td>
        </tr>
        <?php  } ?>
      </tbody>
    </table>
</div>
    

<?php include "footer.php"; ?>