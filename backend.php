//configuration de la base de donnee
$host = 'localhost';
$dbname = 'ma_base';
$user = 'root';
$pass = '';
try{

    // 1. connexion a la base de votre base de donnees
$spdo = new PDO ("mysql:host=$host;dbname;charset=utf8",$user,$pass);
$pdo->setAttribut
e(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 2. verification que le formulaire a ete soumis
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

// 3. recuperation et nettoyage sommaire des donnees
$nom = htmlspecialchars($_POST['nom et prenom']);
$numero = htmlspecialchars($_POST['numero de telephone']);
$email = htmlspecialchars($_POST['email']);
$age = intval($_POST['age']);
$mot de passe = htmlspecialchars($_POST['mot de passe'], PASSWORD_DEFAULT);
$article =>htmlcpecialchars($_POST['id']); //c est le name dans mon <select>

// 4. recuperation de l requete SQL(protection contre les injections SQL)
$sql = "INSERT INTO client (nom, numero, email, age, mot_de_passe,article_choisi)"; VALUES (?, ?, ?,?,?,?);
$stmt = $pdo->prepare($sql);

// 5. execution
$stmt->execute(['nom'=> $nom, 'numero'=> $numero, 'email'=>$email,'age'=> $age, 'mot de passe'=> $mot de passe,'article'=>$article]);
echo "<h2 >Enregistrement reussi!</h2>"
echo "<href='index.html'>Retour au formulaire</a>
};
}catch (PDOException $e) { 
    die ("Erreur de connexion:" . 1e->getMessage());}
?>
