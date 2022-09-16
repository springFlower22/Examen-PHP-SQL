<?php
    if(trim($_POST['username'])== null|| trim($_POST['password']) == null){
        header("Refresh:0 , url =  index.html");
        exit();

    }
    else{
         include "./connexionDB/connexionDB.php";
         $username = mysqli_real_escape_string($conn,$_POST['username']);
         $password = mysqli_real_escape_string($conn, $_POST['password']);
         $sql = "SELECT username,password FROM utilisateur WHERE username ='". $username ."' and password = '".$password."'";
         $query = mysqli_query($conn,$sql);
         $result = mysqli_fetch_array($query , MYSQLI_ASSOC);
         if(!$result){
             echo "<script>alert('Mot de passe au nom d'utilisateur invalide.')</script>";
             header("Refresh:0 , url = deconnexion.php");
             exit();
 }
         else{
             session_start();
             $_SESSION['username'] = $result['username'];
             header("Refresh:0 , url = list.php");
             session_write_close();
         }
    }
    mysqli_close($conn);
?>
