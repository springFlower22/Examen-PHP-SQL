<?php
    session_start();
    include "../connexionDB/connexionDB.php";
    if($_SESSION['username'] == null){
        header("Refresh:0 , url = ../list.php");
    exit();
    }
    if($_POST['name'] != null && $_POST['value'] != null){
        $sql = "UPDATE produit SET liste = '" . trim($_POST['name']) . "' ,prix = '" . trim($_POST['value']) . "' WHERE id = '" . $_POST['id'] . "'";
        if($conn->query($sql)){
            echo "<script>alert('Produit modifié')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
        
    }
   
    mysqli_close($conn);
?>
