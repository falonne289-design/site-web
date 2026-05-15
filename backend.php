<?php
// configuration de la base de donnee
$host = 'localhost';
$dbname = 'ma_base';
$user = 'root';
$pass = 'falonne237';

try {

    // 1. connexion a la base de donnees
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. verification que le formulaire a ete soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // 3. recuperation des donnees
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $age = intval($_POST['age']);

        // 4. requete SQL
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, age) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // 5. execution
        $stmt->execute([$nom, $prenom, $email, $age]);

        echo "<h2>Enregistrement réussi !</h2>";
        echo "<a href='index.html'>Retour au formulaire</a>";
    }

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
