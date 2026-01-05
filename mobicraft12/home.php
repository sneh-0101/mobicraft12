<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MobiCraft - Home</title>
  <link rel="stylesheet" href="preloder.css">
  <link rel="stylesheet" href="navbar1.css">
  <link rel="stylesheet" href="theme.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="animations.css">
  <style>

    main {
      flex: 1;
    }
    
    .hero-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 80px 20px;
      background: linear-gradient(135deg, rgba(127, 92, 255, 0.1), rgba(255, 0, 179, 0.1));
    }
    
    .hero-section h1 {
      margin-bottom: 20px;
      background: linear-gradient(90deg,#7f5cff ,#ff00b3, #ffae00);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-size: 4rem;
    }
    
    .hero-section p {
      font-size: 1.5rem;
      margin-bottom: 30px;
      color: #e0e0e0;
    }
    
    .start-btn {
      display: inline-block;
      padding: 16px 40px;
      font-size: 1.2rem;
      font-weight: bold;
      color: #fff;
      background: linear-gradient(135deg, #0078ff, #00c6ff);
      border-radius: 40px;
      text-decoration: none;
      transition: 0.3s;
      box-shadow: 0 4px 15px rgba(0, 120, 255, 0.3);
    }
    
    .start-btn:hover {
      background: linear-gradient(135deg, #005ecb, #00a6ff);
      transform: scale(1.05);
      box-shadow: 0 6px 20px rgba(0, 120, 255, 0.5);
    }
    
    .simple-features {
      padding: 60px 20px;
      background: rgba(255,255,255,0.02);
    }
    
    .features-container {
      max-width: 1000px;
      margin: 0 auto;
    }
    
    .features-container h2 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 40px;
      background: linear-gradient(90deg, #7f5cff, #ff00b3, #ffae00);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    
    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }
    
    .feature-card {
      background: rgba(255,255,255,0.05);
      padding: 25px;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }
    
    .feature-card:hover {
      transform: translateY(-5px);
    }
    
    .feature-card h3 {
      color: #ff9f43;
      font-size: 1.3rem;
      margin-bottom: 12px;
    }
    
    .feature-card p {
      color: #d0d0d0;
      line-height: 1.5;
      font-size: 0.95rem;
    }
    
    @media (max-width: 768px) {
      .hero-section h1 {
        font-size: 2.5rem;
      }
      
      .hero-section p {
        font-size: 1.2rem;
      }
      
      .features-container h2,
      .cta-section h2 {
        font-size: 2rem;
      }
      
      .cta-buttons {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>
  <!-- Preloader -->
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
      <a href="home.php" class="active">Home</a>
      <a href="about.php">About</a>
      <a href="contect.php">Contact</a>
      <a href="pricelist.php">Pricelist</a>
      
   
      
      <div class="dropdown">
        <button class="dropdown-btn">Support ▼</button>
        <div class="dropdown-content">
          <a href="warranty.php">Warranty Info</a>
          <a href="shipingpoilcy.php">Shipping Policy</a>
          <a href="trackorder.php">TrackYouOrder</a>
          <a href="#faq">FAQ</a>
        </div>
      </div>
      
    </nav>
  </header>

  <!-- Main Content -->
  <main>
    <section class="hero-section">
      <h1 class="fade-in">Welcome to MobiCraft</h1>
      <p class="fade-in-delay-1">Design and customize your dream phone from scratch</p>
      <a href="phonedesign.php" class="start-btn btn-animated bounce-in">Start Customizing</a>
    </section>

    <section class="simple-features">
      <div class="features-container">
        <h2>Why Choose MobiCraft?</h2>
        <div class="features-grid">
          <div class="feature-card card-animated fade-in-delay-1">
            <h3>🎨 Complete Customization</h3>
            <p>Design every aspect of your phone from screen to processor.</p>
          </div>
          <div class="feature-card card-animated fade-in-delay-2">
            <h3>💰 Transparent Pricing</h3>
            <p>See real-time pricing for every component with no hidden fees.</p>
          </div>
          <div class="feature-card card-animated fade-in-delay-3">
            <h3>⚡ Latest Technology</h3>
            <p>Choose from newest processors and cutting-edge features.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

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
           <li><a href="pricelist.php">Pricing</a></li>
          <li><a href="contect.php">Contact</a></li>
        </ul>
      </div>
      
  
      
      <div class="footer-section">
        <h3>Contact Info</h3>
        <div class="contact-info">
          <div>📧 contact@mobicraft.com</div>
          <div>📞 91 9313599945</div>
          <div>📍 123 rajputpara near bus statd rajkot</div>
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
  <script src="drag-animations.js"></script>
</body>
</html>
