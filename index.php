<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <title>Journal Tech</title>
</head>
<body>

<?php include 'header.php'; ?>

<?php include 'connexion.php' ?>

<?php 
$result = $conn->query("SELECT * FROM ARTICLES");
echo "<br> <h2>Résultats : </h2><br><br>";
foreach ($result as $row) {
    echo "<section class= 'd-flex justify-content-center ' >";
    echo "<article class = 'card text-center m-2 w-75'>";
    echo " auteur = " . $row['auteur'] . "<br><br>";
    echo " titre = " . $row['titre'] . "<br><br>";
    echo " contenu = " . $row['contenu'] . "<br><br>";
    echo " date = " . $row['date'] . "<br><br>";

    echo "<div class = 'd-flex justify-content-center'>";
    echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning m-2 w-25'>Modifier</a>"; //Ajoute le lien dans le boutton pour aller sur le fichier edit
    echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger m-2 w-25'>Supprimer</a>"; //Suprrime l'aritcle
    echo "</div>";

    echo "</article>";
    echo "</section>";
}

?>

<?php include 'footer.php'; ?>

    <script src="bootstrap-5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>