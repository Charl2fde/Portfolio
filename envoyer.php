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

    // Affiche un message de confirmation
    echo "Votre message a été envoyé avec succès.";

    // Adresse email du destinataire
$to = "charlesdefde@gmail.com";

// Sujet de l'email
$subject = "Nouveau message depuis le formulaire de contact";

// Corps de l'email
$message = "Nom : " . $nom . "\n";
$message .= "Prénom : " . $prenom . "\n";
$message .= "Email : " . $email . "\n";
$message .= "Téléphone : " . $telephone . "\n";
$message .= "Message : " . $message . "\n";

// Entêtes de l'email
$headers = "From: adresse-email-de-l-expediteur@example.com" . "\r\n" .
"Reply-To: adresse-email-de-l-expediteur@example.com" . "\r\n" .
"X-Mailer: PHP/" . phpversion();

// Envoi de l'email
mail($to, $subject, $message, $headers);
   
?>
