<?php
    session_start();
    include "../connexionDB/connexionDB.php";
    if($_SESSION['username'] == null){
    header("Refresh:0 , url = ../index.html");
    exit();

    }

    if($_POST['name'] != null && $_POST['amount'] != null ){
        $sql = "INSERT INTO produit (liste,prix) VALUES ('". trim($_POST['name']). "','". trim($_POST['amount']). "')";
        if($conn->query($sql)){
            echo "<script>alert('Produit ajoutée')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
       
    }
    mysqli_close($conn);
?>