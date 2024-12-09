<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <title>Ajouter un Article</title>
</head>
<body>

<?php
// Inclure le fichier de connexion
include 'connexion.php';
// Inclure le header
include 'header.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyée
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];

    // Vérifier que tous les champs sont remplis
    if ($titre && $auteur && $contenu && $date) {
        // Préparer la requête SQL pour insérer les données
        $sql = "INSERT INTO articles (titre, auteur, contenu, date) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Exécuter la requête
        if ($stmt->execute([$titre, $auteur, $contenu, $date])) {
            echo "<p class='alert alert-success'>Article ajouté avec succès !</p>";
        } else {
            echo "<p class='alert alert-danger'>Erreur lors de l'ajout de l'article.</p>";
        }
    } else {
        echo "<p class='alert alert-warning'>Veuillez remplir tous les champs.</p>";
    }
}
?>

<h2 class="text-center mb-4">Ajouter un Article</h2>

<section class ="d-flex justify-content-around">
<form class="row g-3 text-center needs-validation" method="POST" novalidate>
  <div class="col-md-4 ">
    <label for="titre" class="form-label">Titre : </label>
    <input type="text" name="titre" class="form-control" id="titre" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="col-md-4">
    <label for="auteur" class="form-label">Auteur : </label>
    <input type="text" name="auteur" class="form-control" id="auteur" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-md-6">
    <label for="contenu" class="form-label">Contenu : </label>
    <textarea name="contenu" class="form-control" id="contenu" rows="5" required></textarea>
    <div class="invalid-feedback">
      Veuillez entrer un contenu.
    </div>
  </div>

  <div class="col-md-6">
    <label for="date" class="form-label">Date : </label>
    <input type="date" name="date" class="form-control" id="date" required>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Ajoutez</button>
  </div>
</form>
</section>
<?php
// Inclure le footer
include 'footer.php';
?>

    <script src="bootstrap-5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
