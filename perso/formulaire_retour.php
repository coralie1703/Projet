<?php include 'header.php';
require 'functions.php'; ?>

<?php
// peut mettre <?= à la place de <?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];



// Récupération des informations de l'utilisateur connecté
$host = "localhost"; // Nom d'hôte de la base de données
$user = "root"; // Nom d'utilisateur de la base de données
$password_db = ""; // Mot de passe de la base de données
$dbname = "greengarden"; // Nom de la base de données

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password_db);
    // configuration pour afficher les erreurs pdo
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification si le formulaire a été soumis
    if (
        isset($_POST['type_retour']) && isset($_POST['date_retour']) && isset($_POST['id_etat']) && isset($_POST['id_techni']) && isset($_POST['id_commande'])
    ) {
        $type_retour = $_POST['type_retour'];
        $date_retour = time();
        $id_etat = $_POST['id_etat'];
        $id_techni = $_POST['id_techni'];
        $id_commande = $_POST['id_commande'];

        try {
            $stmt = $pdo->prepare("INSERT INTO ticket_retour (Type_Retour, Date_Retour, Id_Etat_Retour, Id_technicien, Id_Commande)

                
					 VALUES (:typeretour,:dateretour, :idetat, :idtechni, :idcommande)");
            $stmt->bindValue(':typeretour', $type_retour);
            $stmt->bindValue(':dateretour', $date_retour);
            $stmt->bindValue(':idetat', $id_etat);
            $stmt->bindValue(':idtechni', $id_techni);
            $stmt->bindValue(':idcommande', $id_commande);
            $stmt->execute();
            $order_id = $pdo->lastInsertId();
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
            exit();
        }
    }
}
?>

<?php

if (isset($error)) : ?>
    <p style="color: red"><?= $error ?></p>
<?php endif ?>

<?php if (isset($success)) : ?>
    <p style="color: green"><?= $success ?></p>
<?php endif ?>

<h1>Création d'un ticket de retour</h1>

<form method="post" enctype="multipart/form-data">

<br>

    <div>
        <label for="dateretour">Date retour : <?php echo date("Y-m-d H:i:s")?> </label>

    </div>
    
    <br>
    
    <div>
        <label for="typeretour">Type de retour :</label>
        <input type="text" id="typeret" name="type_retour" required>
    </div>

    <br>

    <div>
        <label for="idetat">Id état retour :</label>
        <input type="text" id="idetat" name="id_etat" required>
    </div>

    <br>

    <div>
        <label for="idtechni">Id technicien :</label>
        <input type="text" id="idtechni" name="id_techni" required>
    </div>

    <br>

    <div>
        <label for="idcommande">Id commande :</label>
        <input type="text" id="idcommande" name="id_commande" required>
    </div>
    <div>
        <br>
        <button type="submit">Ajouter</button>
</form>
</body>

<?php include 'footer.php'; ?>