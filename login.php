<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez si les champs sont vides
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "Both username and password are required.";
    } else {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "bookdb";
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            echo("La connexion a échoué : " . $conn->connect_error);
        } else {
            // Retrieve user input from the form
            $entered_username = $_POST["username"];
            $entered_password = $_POST["password"];

            // Query the database to check if the username and password match
            $query = "SELECT id, username, password, accounttype FROM users WHERE username = ?";
            
            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param("s", $entered_username);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($user_id, $db_username, $db_password, $accounttype);
                    $stmt->fetch();

                    // Verify the password
                    if (password_verify($entered_password, $db_password)) {
                        // Password is correct
                        $_SESSION['user_id'] = $user_id;

                        // Redirect based on account type
                        if ($accounttype === 'admin') {
                            header("Location: adminpage.php");
                            exit();
                        } elseif ($accounttype === 'user') {
                            header("Location: userpage.php");
                            exit();
                        } else {
                            echo "Unknown account type.";
                        }
                    } else {
                        echo "Invalid password.";
                    }
                } else {
                    echo "Username not found.";
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Database error. Please try again later.";
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
<div class="heading" style="background:url(image/chi.webp) no-repeat">
    <h1>login</h1>
</div>
<div class="wrapper">
    <div class="form-box login">
        <form action="" method="post">
            <div class="input-box">
                <label>username:</label><i class='fas fa-user'></i>
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="input-box">
                <label>password:</label> <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <input type="submit" name="login" value="Se connecter">
        </form>
        <div class="logreg-link">
            <p>don't have an account?<a href="#" class="register-link">signup</a></p>
        </div>
    </div>

</div>
<?php
session_start();

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);

if ($username !== null) {
    $_SESSION["username"] = $username;
    
    if ($username === "admin") {
        header("Location: adminpage.php");
    } else {
        header("Location: userpage.php");
    }
    exit(); // Assurez-vous de quitter le script après la redirection.
}
?>

<section class="footer">
    <div class="box-container">
        <h3>quick links</h3>
        <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
        <a href="about.php"><i class="fas fa-angle-right"></i> about</a>
        <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
        <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
        <a href="login.php"> <i class="fas fa-angle-right"></i> login</a>
        <a href="signup.php"> <i class="fas fa-angle-right"></i> sign up</a>
    </div>
    <div class="box-container">
        <h3>extra-links</h3>
        <a href="#"> <i class="fas fa-angle-right"></i> ask-questions</a>
        <a href="#"><i class="fas fa-angle-right"></i> about-us</a>
        <a href="#"> <i class="fas fa-angle-right"></i> privacy-policy</a>
        <a href="#"><i class="fas fa-angle-right"></i> term-of-use</a>
    </div>
    <div class="box-container">
        <h3>contact info</h3>
        <a href="#"> <i class="fas fa-phone"></i>+2162582697</a>
        <a href="#"><i class="fas fa-envelope"></i> Info@agence-grira-travel.ch</a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i>zone touristique Ghlissia douz , Douz, Tunisia</a>
    </div>
    <div class="box-container">
        <h3>follow-us</h3>
        <a href="https://www.facebook.com/Griratravel"><i class="fab fa-facebook-f"></i>facebook</a>
        <a href="#"><i class="fab fa-twitter"></i>twitter</a>
        <a href="#"><i class="fab fa-instagram"></i>instagram</a>
        <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
    </div>
    <div class="credit">createby <span>chaymaleghribi</span> | all right reserved!</div>
</section>
</body>
</html>
