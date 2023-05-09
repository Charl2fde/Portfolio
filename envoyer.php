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

// Adresse email du destinataire
$to = "portfolioc2fde@googlegroups.com";

// Sujet de l'email
$subject = "Nouveau message depuis ton Portfolio !";

// Corps de l'email
$email_body = "Nom : " . $nom . "\n";
$email_body .= "Prénom : " . $prenom . "\n";
$email_body .= "Email : " . $email . "\n";
$email_body .= "Téléphone : " . $telephone . "\n";
$email_body .= "Message : " . $message . "\n";

// Entêtes de l'email
$headers = "From: " . $email . "\r\n" . // remplace l'adresse email de l'expéditeur
"Reply-To: " . $email . "\r\n" .
"X-Mailer: PHP/" . phpversion().
"X-PM-Message-Stream: Portfolio\r\n";

// Envoi de l'email
if(mail($to, $subject, $email_body, $headers)) {
    echo "Votre message a été envoyé avec succès.";
} else {
    echo "Une erreur est survenue lors de l'envoi de votre message.";
}
}
?>
