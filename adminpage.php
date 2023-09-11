<?php
session_start();
if (isset($_SESSION["username"])) {
    $entered_username = htmlspecialchars($_SESSION["username"]);
} else {
    $entered_username = "Guest";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
<div class="container">
    <div class="content">
        <h3>Hi, <span>admin</span></h3>
        <h1>Welcome <span><?php echo $entered_username; ?></span></h1>

        <p>This is an admin page</p>
        <a href="login.php" class="btn">Login</a>
        <a href="signup.php" class="btn">Sign Up</a>
        <a href="admin.php" class="btn">book_admin</a>
        <a href="afficheruser.php" class="btn">lister user</a>
        <a href="book-form.php" class="btn">lister  bookform</a>
        
    
    </div>
</div>
</body>
</html>
