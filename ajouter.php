<?php
session_start();
include "connexionDB/connexionDB.php";
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM produit";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html>
<head>
    <title>Liste de produits</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link 
    rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous"
>
<link rel="stylesheet" href="pages/style.css"/></link>
   
</head>
<body>
<nav class="navbar navbar-dark bg-dark text-center">
        <span class="navbar-brand mb-0 h1 text-center"></span>
        <a name="" id="" class="button-logout" href="deconnexion.php" role="button">Déconnexion</a>
    </nav>
    
    <div class="content">
    <div class="row">
    <div class="col-12">
        <h2>Liste de produits</h2>
        <h3>Ajouter un produit</h3>
        <h2> <?php echo $username ?> effectue un ajout</h2>
    </div>
    </div>
</div>
    <div class="table-product">
        <table class="table">
            <thead>
                <tr>
                <th>Num</th>
                <th>ID:Produit</th>
                <th>Liste</th>
                <th>Prix</th>
                <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['liste'] ?></td>
                        <td><?php echo $row['prix'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                    </tr>
                <?php
                    $id++;
                } ?>
            </tbody>
        </table>
        <br>
        <div>
            <form method="POST" action="pages/ajouter.php">
            <div class="content">
         <div class="row">
          <div class="col-12">
            <div>
                    <label for="1">Liste de produit : </label>
                    <br>
                    <input type="text" class="" name="name" required>
                </div>
                <div>
                    <label for="2">Prix </label>
                    <br>
                    <input type="number" name="amount" required> </div> <br>
                <div class="form-button">
                    <button type="submit" class="">Ajouter</button>
                    <input type = "submit" value ="Retour"  onclick = "history.go(-1)">
                </div>
            </div>
            <div>
            </div>
            </form>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>