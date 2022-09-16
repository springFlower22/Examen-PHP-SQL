<?php
session_start();
include "connexionDB/connexionDB.php";
$username = $_SESSION['username'];
$sql = "SELECT * FROM produit";
$query = mysqli_query($conn, $sql);
?>

<!doctype html>
<html>
<head>
    <title>Liste</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="pages/style.css"/></link>
    <link 
    rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous"
><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<nav class="navbar navbar-dark bg-dark text-center">
        <span class="navbar-brand mb-0 h1 text-center"></span><br>
        <a name="" id="" class="button-logout" href="deconnexion.php" value="button">Déconnexion</a>
    </nav>
    <div class="content">
    <div class="row">
    <div class="col-12">
        <h2>Liste de produit</h2>
        <h2>Bonjour <?php echo $username ?></h2>
    </div>
    </div>
</div>
        <table>
            <tr>
                <th>Num</th>
                <th>ID:Produit</th>
                <th>Liste</th>
                <th>Prix</th>
                <th>Date</th>
                <th>Modifier</th>
                <th>Suprimer</th>
            </tr>
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
                        <td>
                        <a name="edit" id="" href="modifier.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['liste'] ?>&amount=<?php echo $row['prix']; ?> " value="button">Modifier</a></td>
                        <td><a name="id" id="" href="pages/supprimer.php?id=<?php echo $row['id'] ?>" value="button">supprimer</a></td>
                    </tr>
                <?php
                    $id++;
                } ?>
            </tbody>
        </table>
        <br>
        <a name="" id="" href="ajouter.php" value="button" class="button-add">Ajouter à la liste</a>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>