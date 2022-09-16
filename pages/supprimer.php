<?php
    session_start();
    include "../connexionDB/connexionDB.php";
    $delete_num = $_GET['id'];
    $sql_delete =  "DELETE FROM produit WHERE id = '$delete_num'";
    $query_delete = mysqli_query($conn,$sql_delete);
    $row = mysqli_fetch_assoc($query_delete,MYSQLI_ASSOC);
    if(!$row){      
        header("Location: ../list.php");
        exit();

    }
    mysqli_close($conn);
?>