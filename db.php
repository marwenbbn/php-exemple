<?php
try {
    $con = new PDO('mysql:host=localhost;dbname=store', "root", "");
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>