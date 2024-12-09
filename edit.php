<?php

// Inclure le fichier de connexion
include 'connexion.php';

// Vérifier si un ID est passé en paramètre  //// Method GET FONCTIONNE MAIS PAS POST !!! Get pour récuperer une ressource utilisateur
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Récupérer l'ID de l'article
$id = $_GET['id'];

// Préparer la requête pour récupérer l'article
$sql = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Récupérer les résultats
$result = $stmt->get_result();
$article = $result->fetch_assoc();

// Vérifier si l'article existe
if (!$article) {
    header("Location: index.php");
    exit;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];

    // Préparer la requête pour mettre à jour l'article
    $updateSql = "UPDATE articles SET titre = ?, auteur = ?, contenu = ?, date = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssssi", $titre, $auteur, $contenu, $date, $id);

    // Exécuter la requête
    if ($updateStmt->execute()) {
        // Redirection vers la page principale après mise à jour
        header("Location: index.php");
        exit;
    } else {
        echo "<p class='alert alert-danger'>Erreur lors de la mise à jour de l'article.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <title>Modifier un Article</title>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Modifier l'Article</h2>
    
    <section class="d-flex justify-content-around">
        <form class="row g-3 text-center needs-validation" method="post" novalidate>
          <div class="col-md-4">
            <label for="titre" class="form-label">Titre : </label>
            <input type="text" name="titre" class="form-control" id="titre" value="<?= htmlspecialchars($article['titre']) ?>" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          
          <div class="col-md-4">
            <label for="auteur" class="form-label">Auteur : </label>
            <input type="text" name="auteur" class="form-control" id="auteur" value="<?= htmlspecialchars($article['auteur']) ?>" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

          <div class="col-md-6">
            <label for="contenu" class="form-label">Contenu : </label>
            <textarea name="contenu" class="form-control" id="contenu" rows="5" required><?= htmlspecialchars($article['contenu']) ?></textarea>
            <div class="invalid-feedback">
              Veuillez entrer un contenu.
            </div>
          </div>

          <div class="col-md-6">
            <label for="date" class="form-label">Date : </label>
            <input type="date" name="date" class="form-control" id="date" value="<?= htmlspecialchars($article['date']) ?>" required>
          </div>

          <div class="col-12">
            <button class="btn btn-primary" type="submit">Actualisez</button>
          </div>
        </form>
    </section>
</div>

<?php include 'footer.php'; ?>

<script src="bootstrap-5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>

