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

// Vérifier si l'ID de l'utilisateur à mettre à jour est défini dans l'URL
if (isset($_GET["id"])) {
    $user_id = $_GET["id"];

    // Vérifier si le formulaire de mise à jour a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données soumises depuis le formulaire
        $newUsername = $_POST["newUsername"];
        $newEmail = $_POST["newEmail"];
        $newAccountType = $_POST["newAccountType"];

        // Effectuer la mise à jour dans la base de données
        $updateSql = "UPDATE users SET username=?, email=?, accounttype=? WHERE id=?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("sssi", $newUsername, $newEmail, $newAccountType, $user_id);

        if ($stmt->execute()) {
            // Rediriger vers la page de liste des utilisateurs après la mise à jour
            header("Location: afficheruser.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour : " . $conn->error;
        }
    }

    // Récupérer les données de l'utilisateur à partir de la base de données
    $getUserSql = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($getUserSql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
} else {
    // Si l'ID n'est pas défini dans l'URL, redirigez l'utilisateur vers la liste des utilisateurs ou une autre page appropriée.
    header("Location: afficheruser.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mettre à jour un utilisateur</title>
</head>
<body>
    <h2>Mettre à jour un utilisateur</h2>
    <form method="post">
        <label for="newUsername">Nouveau nom d'utilisateur :</label>
        <input type="text" id="newUsername" name="newUsername" value="<?php echo $user["username"]; ?>" required><br>
        <label for="newEmail">Nouvelle adresse email :</label>
        <input type="email" id="newEmail" name="newEmail" value="<?php echo $user["email"]; ?>" required><br>
        <label for="newAccountType">Nouveau type de compte :</label>
        <input type="text" id="newAccountType" name="newAccountType" value="<?php echo $user["accounttype"]; ?>" required><br>
        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
