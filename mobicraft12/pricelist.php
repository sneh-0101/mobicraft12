<?php
include 'cont.php'; // your DB connection file

// Run query (get only 1 row since table has 1 row with 45 columns)
$query = "SELECT * FROM  partsprice LIMIT 1";
$result = mysqli_query($con, $query);

// Check if query failed
if(!$result){
    die(" Query Failed: " . mysqli_error($con));
}

// Fetch row if available
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
} else {
    die(" No data found in table 'partprice'");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MobiCraft - Price List</title>
    <link rel="stylesheet" href="preloder.css">
    <link rel="stylesheet" href="navbar1.css">
    <link rel="stylesheet" href="footer.css">
     
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background: #0a0f1c;
      color: #fff;
      height: 100vh;
     
      padding: 20px 15px 60px;
    }
    h1 {
      margin: 10px auto 25px;
      color: #7fdbff;
      font-size: 28px;
      text-align: center;
    }
    .section {
      background: #111a2c;
      margin: 15px auto;
      padding: 15px;
      border-radius: 10px;
      max-width: 850px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.4);
      transition: 0.2s;
    }
    .section:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.55);
    }
    .section h2 {
      margin: 0 0 12px;
      font-size: 20px;
      color: #ff9f43;
      border-left: 4px solid #ff9f43;
      padding-left: 8px;
    }
    h3 {
      margin: 12px 0 6px;
      color: #1e90ff;
      font-size: 16px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 6px;
      font-size: 14px;
    }
    th, td {
      padding: 8px 10px;
      border-bottom: 1px solid #1c2940;
      text-align: left;
    }
    th {
      background: #1c2940;
      color: #7fdbff;
      font-weight: 600;
    }
    td.price {
      font-weight: bold;
      color: #2ecc71;
    }
    tr:hover td {
      background: rgba(127,219,255,0.05);
    }
    .price-tag {
      color: #2ecc71;
      font-weight: bold;
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
    <a href="contect.php">Contact</a>
    <a href="pricelist.php" class="active">Pricelist</a>
    
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
  <h1>📱 MobiCraft Price Chart</h1>

  <!-- Screen & Display -->
  <div class="section">
    <h2>📏 Screen & Display</h2>
    <table>
      <tr><th>Component</th><th>Price</th></tr>
      <tr><td>Base Screen (5.0")</td><td class="price"><?php echo $row['screenbase'] ?></td></tr>
      <tr><td>+ per 0.1 inch</td><td class="price"><?php echo $row['screenperinch'] ?></td></tr>
      <tr><td>Flat Display</td><td class="price"><?php echo $row['flatdis'] ?></td></tr>
      <tr><td>Curved Display</td><td class="price"><?php echo $row['curveddis'] ?></td></tr>
      <tr><td>AMOLED</td><td class="price"><?php echo $row['amoladdis'] ?></td></tr>
    </table>
  </div>

  <!-- Processor & Memory -->
  <div class="section">
    <h2>⚙️ Processor & Memory</h2>
    <table>
      <tr><th>Component</th><th>Price</th></tr>
      <tr><td>Mediatek G95</td><td class="price"><?php echo $row['mediatekg95'] ?></td></tr>
      <tr><td>Snapdragon 870</td><td class="price"><?php echo $row['snapdragan870'] ?></td></tr>
      <tr><td>Snapdragon 888</td><td class="price"><?php echo $row['snapdragan888'] ?></td></tr>
      <tr><td>Apple A15</td><td class="price"><?php echo $row['a15'] ?></td></tr>
      <tr><td>Apple A16</td><td class="price"><?php echo $row['a16'] ?></td></tr>
      <tr><td>8GB RAM</td><td class="price"><?php echo $row['8gb'] ?></td></tr>
      <tr><td>12GB RAM</td><td class="price"><?php echo $row['12gb'] ?></td></tr>
      <tr><td>128GB Storage</td><td class="price"><?php echo $row['128gb'] ?></td></tr>
      <tr><td>256GB Storage</td><td class="price"><?php echo $row['256gb'] ?></td></tr>
    </table>
  </div>

  <!-- Battery & Camera -->
  <div class="section">
    <h2>🔋 Battery & Camera</h2>
    <table>
      <tr><th>Component</th><th>Price</th></tr>
      <tr><td>3000 mAh Battery</td><td class="price"><?php echo $row['3000mah'] ?></td></tr>
      <tr><td>+ per 500 mAh</td><td class="price"><?php echo $row['per500mah'] ?></td></tr>
      <tr><td>20W Charging</td><td class="price"><?php echo $row['5w'] ?></td></tr>
      <tr><td>Wireless Charging</td><td class="price"><?php echo $row['wireless'] ?></td></tr>
      <tr><td>1 Camera</td><td class="price"><?php echo $row['camera1'] ?></td></tr>
      <tr><td>2 Cameras</td><td class="price"><?php echo $row['camera2'] ?></td></tr>
      <tr><td>3 Cameras</td><td class="price"><?php echo $row['camera3'] ?></td></tr>
    </table>
  </div>

  <!-- Materials & Design -->
  <div class="section">
    <h2>📱 Materials & Design</h2>
    <table>
      <tr><th>Component</th><th>Price</th></tr>
      <tr><td>Glass Back</td><td class="price"><?php echo $row['glass'] ?></td></tr>
      <tr><td>Plastic Back</td><td class="price"><?php echo $row['plastic'] ?></td></tr>
      <tr><td>Aluminium Back</td><td class="price"><?php echo $row['aluminum'] ?></td></tr>
      <tr><td>Leather Back</td><td class="price"><?php echo $row['lether'] ?></td></tr>
      <tr><td>Custom Design</td><td class="price"><?php echo $row['chossdesing'] ?></td></tr>
    </table>
  </div>
  
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
