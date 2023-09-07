

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about-us</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <section class="header">
    <a href="home.php" class="logo">agence grira travel. <img src="image/logo.jpg" alt="Travel Logo" width="20px" height="20px"></a>
        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="package.php">package</a>
           
            <a href="login.php">login</a>
            <a href="signup.php">sign up</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
   <div class="heading" style="background:url(image/yy.avif) no-repeat">
    <h1>book</h1>
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    // Vérifier que les champs obligatoires ne sont pas vides
    if (empty($name) || empty($firstname) || empty($email) || empty($phone) || empty($address) || empty($location) || empty($guests) || empty($arrivals) || empty($leaving)) {
        echo "<script> alert('Tous les champs sont obligatoires. Veuillez remplir tous les champs.')</script>";
        
    } else {
        $request = "INSERT INTO bookform (name, firstname, email, phone, address, location, guests, arrivals, leaving) VALUES ('$name', '$firstname', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";
        
        if ($conn->query($request) === TRUE) {
            header('Location: book.php');
            exit();
        } else {
            echo " Erreur lors de l'insertion : " . $conn->error;
        }
    }
} 

if (isset($_POST['read'])) {
    // Récupérer les données de la base de données
    $sql = "SELECT id, name, firstname, email, phone, address, location, guests, arrivals, leaving FROM bookform";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Nom</th>';
        echo '<th>Prénom</th>';
        echo '<th>Email</th>';
        echo '<th>Téléphone</th>';
        echo '<th>Adresse</th>';
        echo '<th>Emplacement</th>';
        echo '<th>Nombre invités</th>';
        echo '<th>Date arrivée</th>';
        echo '<th>Date de départ</th>';
        echo '<th>Action</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['firstname'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['address'] . '</td>';
            echo '<td>' . $row['location'] . '</td>';
            echo '<td>' . $row['guests'] . '</td>';
            echo '<td>' . $row['arrivals'] . '</td>';
            echo '<td>' . $row['leaving'] . '</td>';
            echo '<td><form action="" method="post">';
            echo '<input type="hidden" name="id" value="' . $row['id'] .'"> 
            <input type="submit" value="update" name="update">'; 
            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            echo '<input type="submit" value="delete" name="delete">';
echo '</form></td>';
            
          
        }

        echo '</table>';
    } else {
        echo "Aucune donnée trouvée dans la base de données.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {

    // Récupérer l'ID de l'enregistrement à mettre à jour
    $id = $_POST["id"];

    // Initialiser un tableau pour stocker les mises à jour
    $updateFields = array();
    $types = ""; // Pour stocker les types de données (s pour les chaînes, i pour les entiers)

    // Vérifier chaque champ et ajouter à $updateFields s'il a été modifié
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $updateFields[] = "name = ?";
        $types .= "s"; // Champ de type chaîne
    }
    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
        $updateFields[] = "firstname = ?";
        $types .= "s"; // Champ de type chaîne
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $updateFields[] = "email = ?";
        $types .= "s"; // Champ de type chaîne
    }
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        $updateFields[] = "phone = ?";
        $types .= "s"; // Champ de type chaîne
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
        $updateFields[] = "address = ?";
        $types .= "s"; // Champ de type chaîne
    }
    if (isset($_POST['location'])) {
        $location = $_POST['location'];
        $updateFields[] = "location = ?";
        $types .= "s"; // Champ de type chaîne
    }
    if (isset($_POST['guests'])) {
        $guests = $_POST['guests'];
        $updateFields[] = "guests = ?";
        $types .= "s"; // Champ de type chaîne
    }
    if (isset($_POST['arrivals'])) {
        $arrivals = $_POST['arrivals'];
        $updateFields[] = "arrivals = ?";
        $types .= "s"; // Champ de type chaîne
    }
    if (isset($_POST['leaving'])) {
        $leaving = $_POST['leaving'];
        $updateFields[] = "leaving = ?";
        $types .= "s"; // Champ de type chaîne
    }

    // Construire la requête SQL en fonction des champs modifiés
    if (!empty($updateFields)) {
        $sql = "UPDATE bookform SET " . implode(", ", $updateFields) . " WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Lier les paramètres et exécuter la requête
            $paramValues = array_merge(array($types), $updateFields, array($id));
            call_user_func_array(array($stmt, 'bind_param'), $paramValues);

            if ($stmt->execute()) {
                echo "<script> alert('Mise à jour réussie.')</script>";
            } else {
                echo "<script> alert('Erreur lors de la mise à jour :')</script> " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "<script> alert ('Erreur de préparation de la requête : ')</script>" . $conn->error;
        }
    } else {
        echo "<script> alert ('Aucun champ à mettre à jour.')</script>";
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    // Récupérer l'ID de l'enregistrement à supprimer
    $id = $_POST["id"];

    // Préparer et exécuter la requête de suppression
    $sql = "DELETE FROM bookform WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<script> alert('Suppression réussie.')</script>";
        } else {
            echo "<script>alert('Erreur lors de la suppression :')</script> " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $conn->error;
    }
}

$conn->close();
?>




<!-- footer section start  -->


<section class="footer">
        <div class="box-container">
            <h3> quick links</h3>
        <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i> about</a>
            <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
            <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
            <a href="login.php"> <i class="fas fa-angle-right"></i> login</a>
            <a href="signup.php"> <i class="fas fa-angle-right"></i> sign up</a>
</div>
<div class="box-container">
            <h3> extra-links</h3>
        <a href="#"> <i class="fas fa-angle-right"></i> ask-questions</a>
            <a href="#"><i class="fas fa-angle-right"></i> about-us</a>
            <a href="#"> <i class="fas fa-angle-right"></i> privacy-policy</a>
            <a href="#"><i class="fas fa-angle-right"></i> term-of-use</a>
</div>
<div class="box-container">
            <h3>contact info</h3>
        <a href="#"> <i class="fas fa-phone"></i>+2162582697</a>
            <a href="#"><i class="fas fa-envelope"></i> Info@agence-grira-travel.ch</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i>zone touristique Ghlissia douz , Douz, Tunisia</a>
            
</div>
<div class="box-container">
    <h3>follow-us</h3>
    <a href="https://www.facebook.com/Griratravel"><i class="fab fa-facebook-f"></i>facebook</a>
    <a href="#"><i class="fab fa-twitter"></i>twitter</a>
    <a href="#"><i class="fab fa-instagram"></i>instagram</a>
    <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
</div>
<div class="credit">createby <span>chaymaleghribi</span> |all rightreserved!</div>

</section>


    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>