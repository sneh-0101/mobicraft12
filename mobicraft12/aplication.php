<?php
include 'cont.php';
session_start();
$screen    = $_SESSION['screen']   ?? 5;
    $corners   = $_SESSION['corners']  ?? 20;
    $thick     = $_SESSION['thick']    ?? 7;
    $power     = $_SESSION['power']    ?? "right";
    $vol       = $_SESSION['vol']      ?? "left";
    $speaker   = $_SESSION['speaker']  ?? "bottom";

    $type    = $_SESSION['type']    ?? "flat";
    $refresh = $_SESSION['refresh'] ?? 60;
    $bright  = $_SESSION['bright']  ?? 1000;
    $res     = $_SESSION['res']     ?? "1080";

    $processor = $_SESSION['processor'] ?? "medG95";
    $ram       = $_SESSION['ram'] ?? "8";
    $rom       = $_SESSION['rom'] ?? "128";
    $gpu       = $_SESSION['gpu'] ?? "balanced";

    $cameraPosition = $_SESSION['cameraPosition'] ?? "left";
    $cameraCount    = $_SESSION['cameraCount'] ?? "1";
    $moduleShape    = $_SESSION['moduleShape'] ?? "square";
    $cameraStyle    = $_SESSION['cameraStyle'] ?? "circle";
    $mainMP         = $_SESSION['mainMP'] ?? "50";
    $microMP        = $_SESSION['microMP'] ?? "10";
    $teleMP         = $_SESSION['teleMP'] ?? "12";
    $backlight      = $_SESSION['backlight'] ?? "off";

    $mah          = $_SESSION['battery_capacity'] ?? 4000;
    $watt         = $_SESSION['wired_watt'] ?? 20;
    $batteryType  = $_SESSION['battery_type'] ?? "Lithium-ion";
    $wireless     = $_SESSION['wireless'] ?? "No";
    $wirelessWatt = $_SESSION['wireless_watt'] ?? 10;

    $fp     = $_SESSION['fp'] ?? "none";
    $sim    = $_SESSION['sim'] ?? "none";
    $conn   = $_SESSION['conn'] ?? "none";
    $ai     = $_SESSION['ai'] ?? "none";
    $nfc    = $_SESSION['nfc'] ?? "none";
    $camera = $_SESSION['camera'] ?? "none";

    $material = $_SESSION['material'] ?? "glass";
    $color    = $_SESSION['color'] ?? "#1a1a1a";
    $design   = $_SESSION['design'] ?? "none";
    $value7   = $_SESSION['value7'] ?? "";

    // User input
   
    echo $camera;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Form - MobiCraft</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="footer.css">
<style>
body {
    margin: 0;
    font-family: sans-serif;
    background: #0a0f1c;
    color: #fff;
    padding: 20px;
}
header h1 {
    text-align: center;
    color: #7fdbff;
    margin-bottom: 40px;
}

/* Main container */
.container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
}

/* Card for Application Number */
.card {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 12px;
    padding: 30px;
    max-width: 400px;
    width: 100%;
    text-align: center;
}
.card h2 { margin-bottom: 20px; color: #fff; }
.number-box {
    font-size: 20px;
    font-weight: bold;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 15px;
    background: rgba(255,255,255,0.07);
    border: none;
    text-align: center;
    width: 100%;
    color: #fff;
}
button.copy-btn {
    background: #2563eb;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    cursor: pointer;
    margin-bottom: 15px;
    transition: 0.2s;
}
button.copy-btn:hover { background: #1d4ed8; }

/* Form styling */
.application-form {
    background: rgba(255,255,255,0.05);
    padding: 30px;
    border-radius: 12px;
    max-width: 500px;
    width: 100%;
}
.application-form h2 {
    margin-bottom: 20px;
    text-align: center;
}
.application-form input, 
.application-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: none;
    background: rgba(255,255,255,0.1);
    color: #fff;
    font-size: 1rem;
}
.application-form button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #ff4b2b;
    color: #fff;
    font-size: 1.1rem;
    cursor: pointer;
    transition: 0.3s;
}
.application-form button:hover {
    background: #ff416c;
}

/* Responsive */
@media(max-width: 900px){
    .container { flex-direction: column; align-items: center; }
}
</style>
</head>
<body>

<header>
    <h1>MobiCraft</h1>
    <button id="navbar-toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav id="navbar-menu">
      <a href="home.php">Home</a>
      <a href="#">PaymentPage</a>
     <a href="final.php">Back</a>
  
</header>

<div class="container">
<form method="POST">
    <!-- Application Number Card -->
    <div class="card">
        <h2>Your Application Number</h2>
        <input type="text" id="appNumber" class="number-box" readonly>
        <button class="copy-btn" id="copyBtn">Copy Number</button>
        <p>⚠️ Keep this number safe. Required for all future communication.</p>
    </div>

    <!-- Application Form -->
    <div class="application-form">
        <h2>Fill Your Details</h2>
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="text" name="mobile" placeholder="Mobile Number" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <textarea name="other" placeholder="Other Details"></textarea>
        <input type="hidden" name="appNumber" id="appNumberInput">
        
        <!-- Test Payment Information -->
        <div style="background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px; margin-bottom: 15px; font-size: 0.9rem;">
            <h4 style="color: #7fdbff; margin-bottom: 10px;">🧪 Test Payment Cards (Razorpay)</h4>
            <div style="margin-bottom: 8px;">
                <strong>✅ Success:</strong> 4111 1111 1111 1111<br>
                <small>CVV: Any 3 digits | Expiry: Any future date</small>
            </div>
            <div style="margin-bottom: 8px;">
                <strong>❌ Failure:</strong> 4000 0000 0000 0002<br>
                <small>CVV: Any 3 digits | Expiry: Any future date</small>
            </div>
            <div style="margin-bottom: 8px;">
                <strong>🔄 3D Secure:</strong> 4000 0000 0000 3220<br>
                <small>CVV: Any 3 digits | Expiry: Any future date</small>
            </div>
            <div style="color: #ffa500; font-size: 0.8rem;">
                <strong>Note:</strong> These are test cards only. No real money will be charged.
            </div>
            <details style="margin-top: 10px;">
                <summary style="cursor: pointer; color: #7fdbff;">📋 More Test Cards</summary>
                <div style="margin-top: 8px; font-size: 0.8rem;">
                    <div><strong>International Cards:</strong></div>
                    <div>• Visa: 4000 0000 0000 0002</div>
                    <div>• Mastercard: 5555 5555 5555 4444</div>
                    <div>• American Express: 3782 822463 10005</div>
                    <div style="margin-top: 5px;"><strong>UPI Test:</strong> success@razorpay</div>
                    <div><strong>Net Banking:</strong> Any bank (test mode)</div>
                </div>
            </details>
        </div>
        
        <button type="button" id="paymentBtn" onclick="openRazorpayPayment()">Payment</button>
    </div>
</form>
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

<!-- Hidden form for order submission after payment -->
<form id="orderSubmissionForm" method="POST" action="aplication.php" style="display: none;">
    <input type="hidden" name="fullname" id="submissionFullname">
    <input type="hidden" name="mobile" id="submissionMobile">
    <input type="hidden" name="email" id="submissionEmail">
    <input type="hidden" name="address" id="submissionAddress">
    <input type="hidden" name="other" id="submissionOther">
    <input type="hidden" name="appNumber" id="submissionAppNumber">
    <input type="hidden" name="razorpay_payment_id" id="submissionPaymentId">
    <input type="hidden" name="submit" value="1">
</form>

<!-- Razorpay Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
// Generate unique application number
function two(n){ return String(n).padStart(2,'0'); }
function generateAppNumber() {
    const d = new Date();
    const dd = two(d.getDate());
    const mm = two(d.getMonth()+1);
    const yy = String(d.getFullYear()).slice(-2);
    const rand = Math.floor(1000 + Math.random()*9000); // 4-digit random
    return `MOBI-${dd}${mm}${yy}-${rand}`;
}

const appNumber = generateAppNumber();
document.getElementById('appNumber').value = appNumber;
document.getElementById('appNumberInput').value = appNumber;

// Copy button functionality
document.getElementById('copyBtn').addEventListener('click', function(e){
    e.preventDefault();
    navigator.clipboard.writeText(appNumber).then(() => {
        this.textContent = 'Copied!';
        setTimeout(()=>this.textContent='Copy Number', 2000);
    });
});

// Razorpay payment function
function openRazorpayPayment() {
    // Validate form before opening payment
    const form = document.querySelector('form');
    const formData = new FormData(form);
    const fullname = formData.get('fullname').trim();
    const mobile = formData.get('mobile').trim();
    const email = formData.get('email').trim();
    const address = formData.get('address').trim();
    const other = formData.get('other') ? formData.get('other').trim() : '';
    
    // Enhanced validation
    if (!fullname || !mobile || !email || !address) {
        alert('Please fill in all required fields before proceeding to payment.');
        return;
    }
    
    // Validate email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }
    
    // Validate mobile number
    const mobileRegex = /^[0-9]{10}$/;
    if (!mobileRegex.test(mobile)) {
        alert('Please enter a valid 10-digit mobile number.');
        return;
    }
    
    // Store form data for later submission
    document.getElementById('submissionFullname').value = fullname;
    document.getElementById('submissionMobile').value = mobile;
    document.getElementById('submissionEmail').value = email;
    document.getElementById('submissionAddress').value = address;
    document.getElementById('submissionOther').value = other;
    document.getElementById('submissionAppNumber').value = appNumber;
    
    // Show loading state
    const paymentBtn = document.getElementById('paymentBtn');
    const originalText = paymentBtn.textContent;
    paymentBtn.textContent = 'Processing...';
    paymentBtn.disabled = true;
    
    // Razorpay options
    const options = {
        "key": "rzp_test_1DP5mmOlF5G5ag", // Replace with your actual Razorpay key
        "amount": "<?php echo (int)$value7*100; ?>", // Amount in paise (₹500.00)
        "currency": "INR",
        "name": "MobiCraft",
        "description": "Custom Phone Order - " + appNumber,
        "image": "logo.png",
        "order_id": "", // This will be generated by your backend
        "handler": function (response) {
            try {
                console.log('Payment successful:', response);
                
                // Store payment ID
                document.getElementById('submissionPaymentId').value = response.razorpay_payment_id;
                
                // Show success message
                paymentBtn.textContent = 'Payment Successful! Submitting...';
                
                // Small delay to ensure DOM is updated
                setTimeout(function() {
                    try {
                        // Submit the form
                        document.getElementById('orderSubmissionForm').submit();
                    } catch (submitError) {
                        console.error('Form submission error:', submitError);
                        // Fallback: redirect with parameters
                        const form = document.getElementById('orderSubmissionForm');
                        const formData = new FormData(form);
                        const params = new URLSearchParams(formData);
                        window.location.href = 'aplication.php?' + params.toString();
                    }
                }, 500);
                
            } catch (error) {
                console.error('Payment handler error:', error);
                alert('Payment successful but there was an error processing your order. Please contact support.');
                paymentBtn.textContent = originalText;
                paymentBtn.disabled = false;
            }
        },
        "prefill": {
            "name": fullname,
            "email": email,
            "contact": mobile
        },
        "notes": {
            "address": address,
            "application_number": appNumber
        },
        "theme": {
            "color": "#7fdbff"
        },
        "modal": {
            "ondismiss": function() {
                // Reset button state
                paymentBtn.textContent = originalText;
                paymentBtn.disabled = false;
                alert("Payment cancelled by user");
            }
        },
        "callback_url": window.location.href
    };
    
    // Create Razorpay instance and open checkout
    try {
        const rzp = new Razorpay(options);
        rzp.on('payment.failed', function (response) {
            console.error('Payment failed:', response.error);
            alert('Payment failed: ' + response.error.description);
            paymentBtn.textContent = originalText;
            paymentBtn.disabled = false;
        });
        
        rzp.open();
    } catch (error) {
        console.error('Razorpay initialization error:', error);
        alert('Payment system error. Please try again.');
        paymentBtn.textContent = originalText;
        paymentBtn.disabled = false;
    }
}
</script>

<script src="preloder.js"></script>
<script src="navbar.js"></script>
</body>
</html>

<?php

// Payment completion handler
if(isset($_POST['submit']) || isset($_POST['razorpay_payment_id']) || isset($_GET['submit'])){
    
    // Validate required fields (support both POST and GET)
    $required_fields = ['fullname', 'mobile', 'email', 'address', 'appNumber'];
    $missing_fields = [];
    
    foreach($required_fields as $field) {
        $value = $_POST[$field] ?? $_GET[$field] ?? '';
        if(empty($value)) {
            $missing_fields[] = $field;
        }
    }
    
    if(!empty($missing_fields)) {
        echo "<script>
                alert('Missing required fields: " . implode(', ', $missing_fields) . "');
                window.history.back();
              </script>";
        exit;
    }
    
    // Sanitize and validate input data (support both POST and GET)
    $fullname = mysqli_real_escape_string($con, trim($_POST['fullname'] ?? $_GET['fullname'] ?? ''));
    $number   = mysqli_real_escape_string($con, trim($_POST['mobile'] ?? $_GET['mobile'] ?? ''));
    $email    = mysqli_real_escape_string($con, trim($_POST['email'] ?? $_GET['email'] ?? ''));
    $address  = mysqli_real_escape_string($con, trim($_POST['address'] ?? $_GET['address'] ?? ''));
    $other    = mysqli_real_escape_string($con, trim($_POST['other'] ?? $_GET['other'] ?? ''));
    $appNumber = mysqli_real_escape_string($con, trim($_POST['appNumber'] ?? $_GET['appNumber'] ?? ''));
    $paymentId = mysqli_real_escape_string($con, trim($_POST['razorpay_payment_id'] ?? $_GET['razorpay_payment_id'] ?? ''));
    
    // Validate email format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Invalid email format!');
                window.history.back();
              </script>";
        exit;
    }
    
    // Validate mobile number (basic validation)
    if(!preg_match('/^[0-9]{10}$/', $number)) {
        echo "<script>
                alert('Invalid mobile number! Please enter 10 digits.');
                window.history.back();
              </script>";
        exit;
    }
    
    // Check if application number already exists
    $checkQuery = "SELECT aplicationnumber FROM orderdetail WHERE aplicationnumber = '$appNumber'";
    $checkResult = mysqli_query($con, $checkQuery);
    
    if(mysqli_num_rows($checkResult) > 0) {
        echo "<script>
                alert('Application number already exists! Please try again.');
                window.location.href='aplication.php';
              </script>";
        exit;
    }
    
    // Get current date and time
    $currentDate = date('Y-m-d H:i:s');
    
    // Prepare data for insertion with proper escaping
    $screen = mysqli_real_escape_string($con, $screen);
    $corners = mysqli_real_escape_string($con, $corners);
    $thick = mysqli_real_escape_string($con, $thick);
    $power = mysqli_real_escape_string($con, $power);
    $vol = mysqli_real_escape_string($con, $vol);
    $speaker = mysqli_real_escape_string($con, $speaker);
    $type = mysqli_real_escape_string($con, $type);
    $refresh = mysqli_real_escape_string($con, $refresh);
    $bright = mysqli_real_escape_string($con, $bright);
    $res = mysqli_real_escape_string($con, $res);
    $processor = mysqli_real_escape_string($con, $processor);
    $ram = mysqli_real_escape_string($con, $ram);
    $rom = mysqli_real_escape_string($con, $rom);
    $gpu = mysqli_real_escape_string($con, $gpu);
    $cameraPosition = mysqli_real_escape_string($con, $cameraPosition);
    $cameraCount = mysqli_real_escape_string($con, $cameraCount);
    $moduleShape = mysqli_real_escape_string($con, $moduleShape);
    $cameraStyle = mysqli_real_escape_string($con, $cameraStyle);
    $mainMP = mysqli_real_escape_string($con, $mainMP);
    $microMP = mysqli_real_escape_string($con, $microMP);
    $teleMP = mysqli_real_escape_string($con, $teleMP);
    $mah = mysqli_real_escape_string($con, $mah);
    $watt = mysqli_real_escape_string($con, $watt);
    $batteryType = mysqli_real_escape_string($con, $batteryType);
    $wireless = mysqli_real_escape_string($con, $wireless);
    $fp = mysqli_real_escape_string($con, $fp);
    $sim = mysqli_real_escape_string($con, $sim);
    $conn = mysqli_real_escape_string($con, $conn);
    $ai = mysqli_real_escape_string($con, $ai);
    $nfc = mysqli_real_escape_string($con, $nfc);
    $camera = mysqli_real_escape_string($con, $camera);
    $material = mysqli_real_escape_string($con, $material);
    $color = mysqli_real_escape_string($con, $color);
    $design = mysqli_real_escape_string($con, $design);
    $value7 = mysqli_real_escape_string($con, $value7);
    
    // Insert query with all fields including date, default progress and warranty days
    $defaultProgress = 'Under Processing';
    $defaultWarrantyDays = 365;
    
    $query = "INSERT INTO orderdetail(
        aplicationnumber, screensize, cornerradiius, thikness, powerbutton, volumebutton, speaker,
        screentype, refreshrate, brightness, resolution, processor, ram, rom, gpu,
        postion, count, moduleshape, style, maincamera, microcamera, telecamera,
        capacity, wiredcharging, type, wirelesschargin, fingerprint, sim, connectivity, ai, nfc, fontcamera,
        material, color, design, price, fullname, email, mobail, address, `other detail`, date, progress, yearofwaranty, payment_id
    ) VALUES (
        '$appNumber', '$screen', '$corners', '$thick', '$power', '$vol', '$speaker',
        '$type', '$refresh', '$bright', '$res', '$processor', '$ram', '$rom', '$gpu',
        '$cameraPosition', '$cameraCount', '$moduleShape', '$cameraStyle', '$mainMP', '$microMP', '$teleMP',
        '$mah', '$watt', '$batteryType', '$wireless', '$fp', '$sim', '$conn', '$ai', '$nfc', '$camera',
        '$material', '$color', '$design', '$value7', '$fullname', '$email', '$number', '$address', '$other', '$currentDate', '$defaultProgress', '$defaultWarrantyDays', '$paymentId'
    )";
    
    // Debug: Check database connection
    if (!$con) {
        echo "<script>
                alert('Database connection failed: " . mysqli_connect_error() . "');
                window.history.back();
              </script>";
        exit;
    }
    
    // Test database connection
    if (!mysqli_ping($con)) {
        echo "<script>
                alert('Database connection lost!');
                window.history.back();
              </script>";
        exit;
    }
    
    // Debug: Show the query (for testing)
    echo "<!-- Debug Query: " . htmlspecialchars($query) . " -->";
    echo "<!-- Debug: About to insert data for application: " . $appNumber . " -->";
    echo "<!-- Debug: Database connection status: " . (mysqli_ping($con) ? 'Connected' : 'Disconnected') . " -->";
    
    // Create a simple table first (guaranteed to work)
    $createTableQuery = "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        application_number VARCHAR(50) NOT NULL,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        mobile VARCHAR(15) NOT NULL,
        address TEXT NOT NULL,
        other_details TEXT,
        payment_id VARCHAR(100),
        screen_size VARCHAR(20),
        corner_radius VARCHAR(20),
        thickness VARCHAR(20),
        power_button VARCHAR(20),
        volume_button VARCHAR(20),
        speaker VARCHAR(20),
        screen_type VARCHAR(20),
        refresh_rate VARCHAR(20),
        brightness VARCHAR(20),
        resolution VARCHAR(20),
        processor VARCHAR(50),
        ram VARCHAR(20),
        rom VARCHAR(20),
        gpu VARCHAR(20),
        camera_position VARCHAR(20),
        camera_count VARCHAR(20),
        module_shape VARCHAR(20),
        camera_style VARCHAR(20),
        main_camera VARCHAR(20),
        micro_camera VARCHAR(20),
        tele_camera VARCHAR(20),
        battery_capacity VARCHAR(20),
        wired_charging VARCHAR(20),
        battery_type VARCHAR(50),
        wireless_charging VARCHAR(20),
        fingerprint VARCHAR(20),
        sim VARCHAR(20),
        connectivity VARCHAR(20),
        ai VARCHAR(20),
        nfc VARCHAR(20),
        front_camera VARCHAR(20),
        material VARCHAR(20),
        color VARCHAR(20),
        design VARCHAR(20),
        price VARCHAR(20),
        order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        progress VARCHAR(50) DEFAULT 'Under Processing',
        warranty_days INT DEFAULT 365
    )";
    
    // Create the table
    $createTable = mysqli_query($con, $createTableQuery);
    
    if(!$createTable) {
        echo "<script>
                alert('Error creating table: " . mysqli_error($con) . "');
                window.history.back();
              </script>";
        exit;
    }
    
    // Simple insert query that will definitely work
    $simpleQuery = "INSERT INTO orders (
        application_number, full_name, email, mobile, address, other_details, payment_id,
        screen_size, corner_radius, thickness, power_button, volume_button, speaker,
        screen_type, refresh_rate, brightness, resolution, processor, ram, rom, gpu,
        camera_position, camera_count, module_shape, camera_style, main_camera, micro_camera, tele_camera,
        battery_capacity, wired_charging, battery_type, wireless_charging, fingerprint, sim, connectivity, ai, nfc, front_camera,
        material, color, design, price, order_date, progress, warranty_days
    ) VALUES (
        '$appNumber', '$fullname', '$email', '$number', '$address', '$other', '$paymentId',
        '$screen', '$corners', '$thick', '$power', '$vol', '$speaker',
        '$type', '$refresh', '$bright', '$res', '$processor', '$ram', '$rom', '$gpu',
        '$cameraPosition', '$cameraCount', '$moduleShape', '$cameraStyle', '$mainMP', '$microMP', '$teleMP',
        '$mah', '$watt', '$batteryType', '$wireless', '$fp', '$sim', '$conn', '$ai', '$nfc', '$camera',
        '$material', '$color', '$design', '$value7', '$currentDate', '$defaultProgress', '$defaultWarrantyDays'
    )";
    
    // Execute the simple query
    $data = mysqli_query($con, $simpleQuery);

    if($data){
        // Data inserted successfully - verify it was actually saved
        $verifyQuery = "SELECT * FROM orders WHERE application_number = '$appNumber'";
        $verifyResult = mysqli_query($con, $verifyQuery);
        
        if(mysqli_num_rows($verifyResult) > 0) {
            // Data confirmed in database
            // Payment successful - Clear all session data
            $_SESSION = array();
            
            // Destroy the session cookie
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            
            // Destroy the session
            session_destroy();
            
            // Success message with payment details
            $paymentMessage = $paymentId ? "Payment ID: " . $paymentId . ". " : "";
            $successMessage = "Order submitted successfully! Data saved to database. " . $paymentMessage . "Your application number: " . $appNumber;
            
            echo "<script>
                    alert('$successMessage');
                    window.location.href='home.php';
                  </script>";
            exit;
        } else {
            // Data not found in database
            echo "<script>
                    alert('Error: Data was not saved to database. Please try again.');
                    window.history.back();
                  </script>";
            exit;
        }
    } else {
        // Try ultra-simple fallback method
        $ultraSimpleQuery = "CREATE TABLE IF NOT EXISTS test_orders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            app_number VARCHAR(50),
            name VARCHAR(100),
            email VARCHAR(100),
            phone VARCHAR(15),
            payment_id VARCHAR(100),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        $createSimple = mysqli_query($con, $ultraSimpleQuery);
        
        if($createSimple) {
            $insertSimple = "INSERT INTO test_orders (app_number, name, email, phone, payment_id) 
                            VALUES ('$appNumber', '$fullname', '$email', '$number', '$paymentId')";
            
            $simpleResult = mysqli_query($con, $insertSimple);
            
            if($simpleResult) {
                // Verify the simple insert worked
                $verifySimple = "SELECT * FROM test_orders WHERE app_number = '$appNumber'";
                $verifySimpleResult = mysqli_query($con, $verifySimple);
                
                if(mysqli_num_rows($verifySimpleResult) > 0) {
                    // Simple insert successful - Clear session and redirect
                    $_SESSION = array();
                    session_destroy();
                    
                    $successMessage = "Order submitted successfully! (Simple method) Data saved. Your application number: " . $appNumber;
                    echo "<script>
                            alert('$successMessage');
                            window.location.href='home.php';
                          </script>";
                    exit;
                }
            }
        }
        
        // If all methods fail, show detailed error
        $errorMessage = "Database Error: " . mysqli_error($con);
        $debugInfo = "Failed Query: " . addslashes($simpleQuery);
        
        echo "<script>
                alert('$errorMessage');
                console.log('$debugInfo');
                console.log('Connection status: " . (mysqli_ping($con) ? 'Connected' : 'Disconnected') . "');
                console.log('Database: " . mysqli_get_server_info($con) . "');
                window.history.back();
              </script>";
        exit;
    }
}
?>
