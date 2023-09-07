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
    <title>user_page</title>
<link rel="stylesheet" href="styleadmin.css">
</head>
<body>
 <div class="container">
    <div class="content">
        <h3>hi,<span>user</span></h3>
        <h1>welcomes <span><?php echo $entered_username; ?></span></h1>
        <p> this is an user page</p>
        <a href="login.php" class="btn">login</a>
        <a href="signup.php" class="btn">sign_up</a>
        <a href="book.php" class="btn">book_user</a>
    </div>
 </div>   
</body>
</html>