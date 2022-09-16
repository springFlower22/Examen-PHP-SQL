<?php
session_start();
include "../connexionDB/connexionDB.php";
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$sql = "SELECT username FROM utilisateur WHERE username ='" . $username . "'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
if ($result) {
    echo "<script>alert('le nom d'utilisateur est déja utilisé!')</script>";
    header("Refresh:0 , url = compte.html");
    exit();
}else{
if ($_POST['username'] != null && $_POST['password'] != null && $_POST['name'] != null && $_POST['cfpassword'] != null && $_POST['cfpassword'] == $_POST['password']) {
    $sql = "INSERT INTO utilisateur (username,password,name) VALUES ('" . trim($_POST['username']) . "','" . trim(($_POST['password'])) . "','" . trim($_POST['name']) . "')";
    if ($conn->query($sql)) {
        echo "<script>alert('L'enregistrement est complet.')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();
    } 
} 
    mysqli_close($conn);
}
