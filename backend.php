<?php
// configuration de la base de donnee
$host = 'localhost';
$dbname = 'ma_base';
$user = 'root';
$pass = '';

try {

    // 1. connexion a la base de votre base de donnees
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. verification que le formulaire a ete soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // 3. recuperation et nettoyage sommaire des donnees
        $nom = htmlspecialchars($_POST['nom et prenom']);
        $numero = htmlspecialchars($_POST['numero de telephone']);
        $email = htmlspecialchars($_POST['email']);
        $age = intval($_POST['age']);
        $mot_de_passe = htmlspecialchars($_POST['mot de passe']);
        $article = htmlspecialchars($_POST['id']); // c est le name dans mon <select>

        // 4. recuperation de la requete SQL (protection contre les injections SQL)
        $sql = "INSERT INTO utilisateurs (nom, numero, email, age, mot_de_passe, article_choisi) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // 5. execution
        $stmt->execute([$nom, $numero, $email, $age, $mot_de_passe, $article]);

        echo "<h2>Enregistrement reussi !</h2>";
        echo "<a href='index.html'>Retour au formulaire</a>";
    }

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
