

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Add any necessary CSS or external stylesheet links here -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<section class="header">
<a href="home.php" class="logo">agence grira travel. <img src="image/logo.jpg" alt="Travel Logo" width="20px" height="20px"></a>
        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="package.php">package</a>
            <a href="book.php">book</a>
            <a href="login.php">login</a>
            <a href="signup.php">sign up</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
    <div class="heading" style="background:url(image/cc.avif) no-repeat">
        <h1>sign up</h1>
    </div>
    <div class="wrapper">
        <div class="form-box signup">
            <form action="#" method="post">
                
                <!-- Username Input -->
                <div class="input-box">
                    <label>Username:</label>
                    <input type="text" name="username" placeholder="Username" required><br>
                </div>

                <!-- Email Input -->
                <div class="input-box">
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Email" required><br>
                </div>

                <!-- Password Input -->
                <div class="input-box">
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Password" required><br>
                </div>

                <!-- Confirm Password Input -->
                <div class="input-box">
                    <label>Confirm Password:</label>
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" required><br>
                </div>

                <!-- Account Type Dropdown -->
                <div class="input-box">
                    <label>Account Type:</label>
                    <select name="accounttype" required>
                        <option value="" disabled selected>Select Account Type</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <!-- Signup Button -->
                <input type="submit" name="signup" value="Sign Up">

                <!-- Login Link -->
                <div class="logreg-link">
                    <p>Already have an account? <a href="login.php" class="login-link">Login</a></p>
                </div>
            </form>

            
        </div>
        <?php
$host ="localhost"; // Your database host
$username ="root"; // Your database username
$password =""; // Your database password
$database ="bookdb"; // Your database name
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = stripcslashes(strtolower($_POST["username"]));
    $email =stripcslashes(strtolower( $_POST["email"]));
    $password =stripcslashes(strtolower( $_POST["password"]));
    $confirmpassword = stripcslashes(strtolower($_POST["confirmpassword"]));
    $accounttype = $_POST["accounttype"];

    // Perform validation and insert the data into the database
    // You should also handle error cases.
}
// Basic validation
if (empty($username) || empty($email) || empty($password) || empty($confirmpassword) || empty($accounttype)) {
    echo "Please fill in all fields.";
} elseif ($password !== $confirmpassword) {
    echo "Passwords do not match.";
} else {
    // All validation checks passed, insert data into the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

    $sql = "INSERT INTO users (username, email, password, confirmpassword, accounttype) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $username, $email, $hashedPassword, $confirmpassword, $accounttype);
        if ($stmt->execute()) {
            echo "<script> alert('User added successfully!')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "<script> alert('Error preparing SQL statement:')</script> " . $conn->error;
    }
}
?>
    </div>
    <section class="footer">
        <div class="box-container">
            <h3> quick links</h3>
        <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i> about</a>
            <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
            <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
            <a href="login.php"> <i class="fas fa-angle-right"></i> login</a>
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
            <a href="#"> <i class="fas fa-map-marker-alt"></i>zone touristique Ghlissia douz , Douz, Tunisia</a>
            
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
</body>
</html>
