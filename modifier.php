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
        <span class="navbar-brand mb-0 h1 text-center">Interface de produit</span><br>
        <a name="" id="" class="button-logout" href="deconnexion.php" value="button">Déconnexion</a>
    </nav>
    <div class="content">
    <div class="row">
    <div class="col-12">
        <h2>Modification de produit</h2>
        <h2><?php echo $username ?> effectue une modification</h2>
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
            </tr>
            <tbody>
                <?php
                $id = 1;
                while ($column = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $column['id'] ?></td>
                        <td><?php echo $column['liste'] ?></td>
                        <td><?php echo $column['prix'] ?></td>
                        <td><?php echo $column['date'] ?></td>
                    </tr>
                <?php
                    $id++;
                } ?>
            </tbody>
        </table>
        <br>
    </div>
    <div>
        <form method="POST" action="pages/modifier.php">
        <div class="content">
         <div class="row">
          <div class="col-12">
            <div class="form-group">
            <div class="col-sm-4">
                <label for="exampleInputEmail1">Liste de produit</label>
                <br>
                <input type="text" class="form-control" name="name" value="<?php echo $_GET['message']; ?>" required>
            </div>
            </div>
            <div class="form-group">
            <div class="col-sm-4">
                <label for="exampleInputPassword1">Prix </label>
                <br>
                <input type="text" value="<?php echo $_GET['amount'] ?>" class="form-control" name="value" required>
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
            </div>
            </div>
            <br>
            <div class="form-button">
                <button type="submit" class="form-button">Modifier</button>
                <input type = "submit" value = "Retour" class="form-button" onclick = "history.go(-1)">
            </div>
        </form>
        </div>
        </div>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>