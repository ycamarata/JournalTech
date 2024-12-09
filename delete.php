<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifier si un ID est passé en paramètre pour la suppression
if (!isset($_GET['id']) || empty($_GET['id'])) {                ////Comme pour le fichier edit method POST ne marche pas!!! Get pour récuperer une ressource utilisateur
    // Si aucun ID n'est passé, rediriger vers la page principale
    header("Location: index.php");
    exit;
}

// Récupérer l'ID de l'article à supprimer
$id = $_GET['id'];

// Préparer la requête pour supprimer l'article de la base de données
$sql = "DELETE FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);

// Vérifier si la préparation a réussi
if ($stmt === false) {
    die("Erreur dans la préparation de la requête SQL : " . $conn->error);
}

$stmt->bind_param("i", $id);

// Exécuter la requête de suppression
if ($stmt->execute()) {
    // Rediriger vers la page principale après la suppression
    header("Location: index.php");
    exit;
} else {
    echo "<p class='alert alert-danger'>Erreur lors de la suppression de l'article.</p>";
}
?>
