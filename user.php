<?php
include "db.php";
include "header.php";
if (isset($_GET['do'])) {
    $do  = $_GET['do'];
    if ($do == "show") {
        $stmt = $con->prepare("SELECT * FROM users");
        $stmt->execute();
        $produits = $stmt->fetchall();
?>

        <div class="container " style="margin-top: 50px;">
            <h1>Users <a href="user.php?do=add" class="btn btn-primary">ADD</a></h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produits as $pro) { ?>
                        <tr>
                            <td><?php echo $pro["id"]; ?></td>
                            <td><?php echo $pro["name"]; ?></td>
                            <td><?php echo $pro["email"]; ?></td>
                            <td><a href="user.php?do=edit&id=<?php echo $pro["id"]; ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="user.php?do=delete&id=<?php echo $pro["id"]; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>

    <?php

    } else if ($do == "add") {

    ?>
        <div class="container " style="margin-top: 50px;">
            <h1> New user</h1>
            <form action="user.php?do=store" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">password</label>
                    <input type="password" name="pwd" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    <?php
    } else if ($do == "store") {

        if (!empty($_POST)) {
            $stmt = $con->prepare("INSERT INTO `users` (`id`, `name`, `email`, `pwd`) VALUES (NULL, :name, :email, :pwd)
            ");
            $stmt->execute($_POST);
            $row = $stmt->rowCount();

            if ($row > 0) {
                echo "user Added !!";
                header('Refresh: 3; URL=/web/user.php?do=show');
            }


            exit;
        }
    } else if ($do == "edit") {
        $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute(array($_GET["id"]));
        $pro = $stmt->fetch();

    ?>
        <div class="container " style="margin-top: 50px;">
            <h1> New Produits</h1>
            <form action="user.php?do=update" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" value="<?php echo $pro["name"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">email</label>
                    <input type="email" name="email" value="<?php echo $pro["email"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">password</label>
                    <input type="password" name="pwd" value="<?php echo $pro["pwd"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <input type="hidden" name="id" value="<?php echo $pro["id"]; ?>">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
<?php
    } else if ($do == "update") {
        if (!empty($_POST)) {
            $stmt = $con->prepare("UPDATE `users` SET `name` = :name, `email` = :email, `pwd` = :pwd WHERE `users`.`id` = :id");
            $stmt->execute($_POST);
            $row = $stmt->rowCount();

            if ($row > 0) {
                echo "user Edited !!";
                header('Refresh: 3; URL=/web/user.php?do=show');
            }


            exit;
        }
    } else if ($do == "delete") {

        $id = $_GET['id'];
        $stmt = $con->prepare("DELETE FROM `users` WHERE `users`.`id` = ? ");
        $stmt->execute(array($id));
        $row = $stmt->rowCount();

        if ($row > 0) {
            echo "users deleted !!";
            header('Refresh: 3; URL=/web/user.php?do=show');
        }
    }
}


include "footer.php";
