<?php
// Include database connection
include 'cont.php'; // $con should be your mysqli connection

if(isset($_POST['submit'])){
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Correct table column names
    $query = "INSERT INTO form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $data = mysqli_query($con, $query);

    if($data){
        echo "<script>
                alert('Message Sent Successfully!');
                window.location.href='home.php';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Error: ".mysqli_error($con)."');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - MobiCraft</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="footer.css">
<style>


.contact-section {
    max-width: 1000px;
    margin: 50px auto;
    padding: 40px;
    background: rgba(255,255,255,0.05);
    border-radius: 15px;
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
}

.contact-section h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.5rem;
    color: #fff;
}

.contact-container {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
}

.contact-form, .contact-info {
    flex: 1 1 400px;
}

.contact-form form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.contact-form input, 
.contact-form textarea {
    padding: 12px;
    border-radius: 8px;
    border: none;
    outline: none;
    background: rgba(255,255,255,0.1);
    color: #fff;
    font-size: 1rem;
}

.contact-form textarea {
    resize: none;
    height: 150px;
}

.contact-form button {
    padding: 12px;
    border: none;
    border-radius: 8px;
    background-color: #ff4b2b;
    color: #fff;
    font-size: 1.1rem;
    cursor: pointer;
    transition: 0.3s;
}

.contact-form button:hover {
    background-color: #ff416c;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 20px;
    font-size: 1.1rem;
}

.contact-info div {
    display: flex;
    align-items: center;
    gap: 15px;
}

.contact-info i {
    font-size: 1.5rem;
    color: #ff4b2b;
}

.map-container {
    margin-top: 30px;
}

@media (max-width: 768px) {
    .contact-container {
        flex-direction: column;
    }
}
</style>
</head>
<body>
       <div id="preloader">
    <div class="logo-container">
      <img src="logo.png" alt="MobiCraft Logo" class="logo-img">
    </div>
  </div>

  <!-- Header -->
  <header>
    <h1>MobiCraft</h1>
    <button id="navbar-toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav id="navbar-menu">
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="contect.php" class="active">Contact</a>
      <a href="pricelist.php">Pricelist</a>
      
            <div class="dropdown">
        <button class="dropdown-btn">Support ▼</button>
        <div class="dropdown-content">
          <a href="warranty.php">Warranty Info</a>
          <a href="shipingpoilcy.php">Shipping Policy</a>
          <a href="trackorder.php">TrackYouOrder</a>
          <a href="faq.php">FAQ</a>
        </div>
      </div>
      
    </nav>
  </header>

<!-- Contact Section -->
<section class="contact-section">
    <h2>Contact Us</h2>
    <div class="contact-container">

        <!-- Contact Form -->
        <div class="contact-form">
            <form method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit" name="submit">Send Message</button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="contact-info">
            <div><i class="fas fa-map-marker-alt"></i> 123 Culture Kutir Road, City, State, ZIP</div>
            <div><i class="fas fa-phone"></i> +91 98765 43210</div>
            <div><i class="fas fa-envelope"></i> contact@culturekutir.com</div>
            <div><i class="fas fa-globe"></i> www.culturekutir.com</div>
        </div>

    </div>

    <!-- Map -->
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.123456789!2d72.123456!3d19.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xabcdef123456789!2sCulture+Kutir!5e0!3m2!1sen!2sin!4v1600000000000!5m2!1sen!2sin" 
            width="100%" 
            height="350" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</section>

<!-- Footer -->
<footer>
  <div class="footer-container">
    <div class="footer-section">
      <h3>MobiCraft</h3>
      <p>Your ultimate destination for custom mobile phone design and creation. Build the phone of your dreams with our comprehensive customization platform.</p>
      <div class="social-links">
        <a href="#" title="Facebook">📘</a>
        <a href="#" title="Twitter">🐦</a>
        <a href="#" title="Instagram">📷</a>
        <a href="#" title="YouTube">📺</a>
      </div>
    </div>
    
    <div class="footer-section">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="phonedesign.php">Phone Design</a></li>
        <li><a href="pricelist.php">Pricing</a></li>
        <li><a href="contect.php">Contact</a></li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h3>Services</h3>
      <ul>
        <li><a href="screen.php">Screen Customization</a></li>
        <li><a href="battary.php">Battery Options</a></li>
        <li><a href="camara.php">Camera Setup</a></li>
        <li><a href="speci.php">Specifications</a></li>
        <li><a href="aplication.php">Applications</a></li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h3>Contact Info</h3>
      <div class="contact-info">
        <div>📧 contact@mobicraft.com</div>
        <div>📞 +1 (555) 123-4567</div>
        <div>📍 123 Tech Street, Innovation City</div>
        <div>🌐 www.mobicraft.com</div>
      </div>
      <div class="footer-links">
        <a href="#warranty">Warranty</a>
        <a href="#support">Support</a>
        <a href="#shipping">Shipping</a>
      </div>
    </div>
  </div>
  
  <div class="footer-bottom">
    <p>&copy; 2024 MobiCraft. All rights reserved.</p>
    <p><a href="#privacy">Privacy Policy</a> | <a href="#terms">Terms of Service</a> | <a href="#copyright">Copyright</a></p>
  </div>
</footer>

<script src="preloder.js"></script>
<script src="navbar.js"></script>
</body>
</html>
