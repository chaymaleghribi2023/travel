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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $newName = $_POST["newName"];
    $newFirstname = $_POST["newFirstname"];
    $newEmail = $_POST["newEmail"];
    $newPhone = $_POST["newPhone"];
    $newAddress = $_POST["newAddress"];
    $newLocation = $_POST["newLocation"];
    $newGuests = $_POST["newGuests"];
    $newArrivals = $_POST["newArrivals"];
    $newLeaving = $_POST["newLeaving"];

    // Effectuer la mise à jour dans la base de données
    $updateSql = "UPDATE bookform SET name=?, firstname=?, email=?, phone=?, address=?, location=?, guests=?, arrivals=?, leaving=? WHERE id=?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sssssssssi", $newName, $newFirstname, $newEmail, $newPhone, $newAddress, $newLocation, $newGuests, $newArrivals, $newLeaving, $id);

    if ($stmt->execute()) {
        echo "<script> alert('Mise à jour réussie.')</script>";
    } else {
        echo "Erreur lors de la mise à jour : " . $stmt->error;
    }
    $stmt->close();
}

// Récupérer l'ID de l'utilisateur à partir de la requête GET
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Récupérer les données de l'utilisateur à partir de la base de données
    $getUserSql = "SELECT * FROM bookform WHERE id=?";
    $stmt = $conn->prepare($getUserSql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Afficher le formulaire de mise à jour avec les champs pré-remplis
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <link rel="stylesheet" href="style.css"/> 
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
            <title>Mettre à jour  de reseration</title>
        </head>
        <body >
            <h2>Mettre à jour de reservation</h2>
            <form method="post" center >
                <input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
                <label for="newName">Nouveau nom :</label>
                <input type="text" id="newName" name="newName" value="<?php echo $user["name"]; ?>" required><br>
                <!-- Répétez ces lignes pour les autres champs avec les valeurs pré-remplies -->
                <label for="newFirstname">Nouveau prénom :</label>
                <input type="text" id="newFirstname" name="newFirstname" value="<?php echo $user["firstname"]; ?>" required><br>
                <label for="newEmail">Nouveau email :</label>
                <input type="email" id="newEmail" name="newEmail" value="<?php echo $user["email"]; ?>" required><br>
                <label for="newPhone">Nouveau téléphone :</label>
<input type="text" id="newPhone" name="newPhone" value="<?php echo $user["phone"]; ?>" required><br>

<label for="newAddress">Nouvelle adresse :</label>
<input type="text" id="newAddress" name="newAddress" value="<?php echo $user["address"]; ?>" required><br>

<label for="newLocation">Nouvelle localisation :</label>
<input type="text" id="newLocation" name="newLocation" value="<?php echo $user["location"]; ?>" required><br>

<label for="newGuests">Nouveaux invités :</label>
<input type="text" id="newGuests" name="newGuests" value="<?php echo $user["guests"]; ?>" required><br>
<label for="newLeaving">Nouveau départ :</label>
<input type="date" id="newLeaving" name="newLeaving" value="<?php echo $user["leaving"]; ?>" required><br>

<label for="newArrivals">Nouvelles arrivées :</label>
<input type="date" id="newArrivals" name="newArrivals" value="<?php echo $user["arrivals"]; ?>" required><br>



                <input type="submit" name="update"  class="btn" value="Mettre à jour">
                    <a href="book-form.php" class="btn">Retour au formulaire</a>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Aucun enregistrement trouvé avec cet ID.";
    }
    $stmt->close();
} else {
    echo "L'ID de l'utilisateur n'est pas spécifié.";
}
?>
