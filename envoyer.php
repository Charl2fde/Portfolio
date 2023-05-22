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
} catch (PDOException $e) {
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

    // Envoi des données par e-mail
    $destinataire = 'charlesdefde@gmail.com';
    $sujet = 'Nouveau formulaire soumis';
    $contenu = "Nom: $nom\n";
    $contenu .= "Prénom: $prenom\n";
    $contenu .= "E-mail: $email\n";
    $contenu .= "Téléphone: $telephone\n";
    $contenu .= "Message: $message\n";

    // En-têtes du mail
    $headers = "From: $email" . "\r\n";

    // Envoyer l'e-mail avec les en-têtes personnalisés
    $result = mail($destinataire, $sujet, $contenu, $headers);

    if ($result) {
        // Redirection vers une page de confirmation
        header("Location: index.html");
    } else {
        echo "Erreur lors de l'envoi du mail.";
    }
}
?>

