<?php
// Inclure le code de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Vérifier si l'ID de l'enregistrement à supprimer est passé en paramètre GET
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Requête SQL pour supprimer l'enregistrement
    $deleteSql = "DELETE FROM bookform WHERE id=?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Rediriger vers la page d'accueil ou une autre page après la suppression
        header("Location: book-form.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Erreur lors de la suppression : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "L'ID de l'enregistrement à supprimer n'est pas spécifié.";
}

$conn->close();
?>
