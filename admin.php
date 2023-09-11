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
            <a href="aficheruser.php">lister user</a>
            

           
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
   <div class="heading" style="background:url(image/yy.avif) no-repeat">
    <h1>book (admin)</h1>
</div>
<section class="booking">
    <h1 class="heading-title">
        Book Your Trip!!!
    </h1>
    <form action="book-form.php" method="post" class="book-form">
        <div class="flex">
            <div class="inputBox">
                <span>Name:</span>
                <input type="text" placeholder="Your name please" name="name" >
            </div>
            <div class="inputBox">
                <span>First Name:</span>
                <input type="text" placeholder="Your first name please" name="firstname">
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input type="email" placeholder="Your email please" name="email">
            </div>
            <div class="inputBox">
                <span>Phone:</span>
                <input type="number" placeholder="Your phone please" name="phone">
            </div>
            <div class="inputBox">
                <span>Address:</span>
                <input type="text" placeholder="Your address please" name="address">
            </div>
            <div class="inputBox">
                <span>Where to:</span>
                <input type="text" placeholder="The place you want to visit" name="location">
            </div>
            <div class="inputBox">
                <span>How many:</span>
                <input type="number" placeholder="Number of guests" name="guests">
            </div>
            <div class="inputBox">
                <span>Arrivals:</span>
                <input type="date" name="arrivals">
            </div>
            <div class="inputBox">
                <span>Leaving:</span>
                <input type="date" name="leaving">
            </div>
            <div class="inputBox">
            <form action="book-form.php" method="post" class="book-form" id="read-form">
            <input type="submit" value="Submit" class="btn" name="send">     
              <input type="submit" value="read" class="btn" name="read">
              <input type="submit" id="updateButton" name="update" value="Mettre à jour" style="display: none;">

        </form>
        </div>
    </form>
</section>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>