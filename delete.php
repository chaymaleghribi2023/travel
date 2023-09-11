<?php
// Inclure le code de connexion à la base de données (similaire à ce que vous avez déjà)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Vérifier si l'ID de l'utilisateur à supprimer est défini dans l'URL
if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
    
    // Supprimer l'utilisateur de la base de données
    $deleteSql = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        // Rediriger vers la page de liste des utilisateurs après la suppression
        header("Location: afficheruser.php");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . $conn->error;
    }
} else {
    // Si l'ID n'est pas défini dans l'URL, redirigez l'utilisateur vers la liste des utilisateurs ou une autre page appropriée.
    header("Location: afficheruser.php");
    exit();
}
?>
