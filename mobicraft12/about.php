<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - MobiCraft</title>
    <link rel="stylesheet" href="preloder.css">
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="navbar1.css">
    <link rel="stylesheet" href="button.css">
    <link rel="stylesheet" href="footer.css">
    <style>
        .about-section {
            max-width: 1200px;
            margin: 50px auto;
            padding: 40px;
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        }

        .about-section h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            background: linear-gradient(90deg, #7f5cff, #ff00b3, #ffae00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #e0e0e0;
        }

        .about-text p {
            margin-bottom: 20px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .feature-card {
            background: rgba(255,255,255,0.08);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .feature-card h3 {
            color: #ff9f43;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .feature-card p {
            color: #d0d0d0;
            line-height: 1.6;
        }

        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin: 40px 0;
            text-align: center;
        }

        .stat-item {
            background: rgba(255,255,255,0.05);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(90deg, #7f5cff, #ff00b3, #ffae00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #bbb;
            font-size: 1rem;
        }

        .mission-vision {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin: 40px 0;
        }

        .mission, .vision {
            background: rgba(255,255,255,0.05);
            padding: 30px;
            border-radius: 12px;
            border-left: 4px solid #ff9f43;
        }

        .mission h3, .vision h3 {
            color: #ff9f43;
            margin-bottom: 15px;
            font-size: 1.4rem;
        }

        .mission p, .vision p {
            color: #e0e0e0;
            line-height: 1.7;
        }

        .cta-section {
            text-align: center;
            margin-top: 50px;
            padding: 40px;
            background: rgba(255,255,255,0.05);
            border-radius: 12px;
        }

        .cta-section h3 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .cta-btn {
            display: inline-block;
            padding: 15px 35px;
            font-size: 1.1rem;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(135deg, #0078ff, #00c6ff);
            border-radius: 40px;
            text-decoration: none;
            transition: 0.3s;
            margin: 0 10px;
        }

        .cta-btn:hover {
            background: linear-gradient(135deg, #005ecb, #00a6ff);
            transform: scale(1.05);
            box-shadow: 0 6px 16px rgba(0, 120, 255, 0.5);
        }

        .cta-btn.secondary {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
        }

        .cta-btn.secondary:hover {
            background: linear-gradient(135deg, #ff5252, #ff7979);
            box-shadow: 0 6px 16px rgba(255, 107, 107, 0.5);
        }

        @media (max-width: 768px) {
            .about-content, .mission-vision {
                grid-template-columns: 1fr;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-section {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .about-section {
                margin: 50px 20px;
                padding: 20px;
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
      <a href="about.php" class="active">About</a>
      <a href="contect.php">Contact</a>
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

  <!-- About Section -->
  <section class="about-section">
    <h2>About MobiCraft</h2>
    
    <div class="about-content">
      <div class="about-text">
        <p>Welcome to <strong>MobiCraft</strong> - your ultimate destination for custom mobile phone design and creation. We believe that your phone should be as unique as you are, which is why we've created the most comprehensive mobile customization platform on the web.</p>
        
        <p>At MobiCraft, we understand that a phone is more than just a device - it's an extension of your personality, your lifestyle, and your needs. That's why we've built a platform that puts you in complete control of every aspect of your mobile device.</p>
      </div>
      
      <div class="about-text">
        <p>Our innovative design system allows you to customize everything from screen size and display technology to processor power, camera capabilities, and even the materials used in construction. Whether you're a tech enthusiast looking for maximum performance or someone who values style and aesthetics, MobiCraft has the tools to bring your vision to life.</p>
        
        <p>With real-time pricing updates and transparent cost breakdowns, you'll always know exactly what you're paying for. No hidden fees, no surprises - just honest, upfront pricing for every component and feature.</p>
      </div>
    </div>

    <!-- Features Grid -->
    <div class="features-grid">
      <div class="feature-card">
        <h3>🎨 Complete Customization</h3>
        <p>Design every aspect of your phone from scratch - screen size, display type, processor, RAM, storage, camera setup, battery capacity, and materials. The possibilities are endless.</p>
      </div>
      
      <div class="feature-card">
        <h3>💰 Transparent Pricing</h3>
        <p>See real-time pricing for every component and feature. Our dynamic pricing system ensures you always get the most accurate cost estimates for your custom phone.</p>
      </div>
      
      <div class="feature-card">
        <h3>⚡ Advanced Specifications</h3>
        <p>Choose from the latest processors, high-resolution displays, professional-grade cameras, and cutting-edge features to create a phone that meets your exact requirements.</p>
      </div>
      
      <div class="feature-card">
        <h3>🔧 Professional Quality</h3>
        <p>Every component is sourced from trusted manufacturers, ensuring your custom phone meets the highest standards of quality and reliability.</p>
      </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
      <div class="stat-item">
        <div class="stat-number">1000+</div>
        <div class="stat-label">Custom Phones Designed</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">50+</div>
        <div class="stat-label">Component Options</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">24/7</div>
        <div class="stat-label">Design Support</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">100%</div>
        <div class="stat-label">Satisfaction Guarantee</div>
      </div>
    </div>

    <!-- Mission & Vision -->
    <div class="mission-vision">
      <div class="mission">
        <h3>Our Mission</h3>
        <p>To democratize mobile phone customization by providing an intuitive, comprehensive platform that empowers users to create their perfect device. We believe everyone deserves a phone that's tailored to their unique needs, preferences, and budget.</p>
      </div>
      
      <div class="vision">
        <h3>Our Vision</h3>
        <p>To become the world's leading platform for mobile device customization, where innovation meets personalization. We envision a future where every mobile device is uniquely crafted to enhance the user's digital experience and reflect their individual style.</p>
      </div>
    </div>

    <!-- Call to Action -->
    <div class="cta-section">
      <h3>Ready to Create Your Dream Phone?</h3>
      <p style="color: #bbb; margin-bottom: 30px;">Start designing your custom mobile device today and experience the future of personalized technology.</p>
      <a href="phonedesign.php" class="cta-btn">Start Designing</a>
      <a href="pricelist.php" class="cta-btn secondary">View Pricing</a>
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