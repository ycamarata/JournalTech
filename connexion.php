
<?php
$host = 'localhost';
$dbname = 'journal';
$username = 'root';
$password = '';
$conn = mysqli_connect($host, $username, $password, $dbname);
// Vérifier la connexion
if (mysqli_connect_errno()) {
echo "Impossible de se connecter à MySQL: " . mysqli_connect_error();
exit();
}  /* else {
    echo 'COCO'; 
} */
?>

<!-- 
$host = 'localhost'; // Nom de l'hôte
$db = 'journal'; // Nom de votre base de données
$user = 'root'; // Nom d'utilisateur MySQL
$pass = ''; // Mot de passe MySQL (vide par défaut sous XAMPP)

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?> -->


<!-- $host = 'localhost';
$dbname = 'journal';
$username = 'root';
$password = 'patmo';
try {
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
echo "Connecté à $dbname sur $host avec succès.";
} catch (PDOException $e) {
die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
} -->
