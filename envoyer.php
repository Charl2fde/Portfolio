<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "id20606176_form_portfolio";
$username = "id20606176_charles";
$password = "Chatelard0300$"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Définit le mode d'erreur PDO à Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $message = $_POST["message"];

    // Prépare et exécute la requête d'insertion
    $stmt = $pdo->prepare("INSERT INTO contacts (nom, prenom, email, telephone, message) VALUES (:nom, :prenom, :email, :telephone, :message)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    // Récupère les données du formulaire
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$message = $_POST["message"];

// Crée le sujet du message avec le label "portfolio"
$sujet = "Portfolio - Nouveau message de $nom $prenom";

// Prépare et exécute la requête d'insertion
$stmt = $pdo->prepare("INSERT INTO contacts (nom, prenom, email, telephone, message) VALUES (:nom, :prenom, :email, :telephone, :message)");
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telephone', $telephone);
$stmt->bindParam(':message', $message);
$stmt->execute();

// Envoie l'e-mail
$to = "charlesdefde@gmail.com";
$headers = "From: $nom $prenom <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "X-Priority: 1\r\n";
$headers .= "X-MSMail-Priority: High\r\n";
$headers .= "X-Sender: $email\r\n";
$headers .= "Return-Path: $email\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= "Subject: $sujet\r\n";

$message = "Nom : $nom<br>";
$message .= "Prénom : $prenom<br>";
$message .= "Email : $email<br>";
$message .= "Téléphone : $telephone<br>";
$message .= "Message : $message<br>";

mail($to, $sujet, $message, $headers);


}

?>
