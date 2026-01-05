<?php
session_start();
$value5  = $_SESSION['value5']     ?? "";

// Save data if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['fp']      = $_POST['fp'] ?? "none";
    $_SESSION['sim']     = $_POST['sim'] ?? "none";
    $_SESSION['conn']    = $_POST['conn'] ?? "none";
    $_SESSION['ai']      = $_POST['ai'] ?? "none";
    $_SESSION['nfc']     = $_POST['nfc'] ?? "none";
    $_SESSION['camera']  = $_POST['camera'] ?? "none";
    $_SESSION['price']   = $_POST['price'] ?? 0;
    $_SESSION['value6']  = $_POST['value6'];

    header("Location: back.php"); // next page
    exit;
}

// Restore previous selections
$fp     = $_SESSION['fp'] ?? "none";
$sim    = $_SESSION['sim'] ?? "none";
$conn   = $_SESSION['conn'] ?? "none";
$ai     = $_SESSION['ai'] ?? "none";
$nfc    = $_SESSION['nfc'] ?? "none";
$camera = $_SESSION['camera'] ?? "none";
$price  = $_SESSION['price'] ?? 0;
$value6  = $_SESSION['value6']     ?? "";
include 'priceview.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MobiCraft - Simple Customizer</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="pricebox.css">
<style>
/* Basic Page and Layout Styles */
.uttam {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 20px;
}
.container {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  max-width: 900px;
  width: 100%;
}
.phone-box {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 5px 20px gray;
}
.controls-box {
  flex: 1.5;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 5px 20px gray;
}
@media (max-width: 768px) {
  .container {
    flex-direction: column;
    margin-top: 150px;
  }
}

/* Phone and Screen Design */
.phone {
  width: 250px;
  height: 500px;
  background-color: #000;
  border: 5px solid #333;
  border-radius: 30px;
  position: relative;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
}
.screen {
  position: absolute;
  inset: 10px;
  background-color: #111;
  border-radius: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  color: white;
  font-size: 16px;
  text-align: center;
}

/* Front Camera and Notch Styles */
.camera-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.notch, .dot, .punch-hole {
  background-color: #111;
  border-radius: 50%;
}
.notch {
  width: 80px;
  height: 25px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  position: relative;
  top: -10px;
}
.dot {
  width: 12px;
  height: 12px;
}
.punch-hole {
  width: 15px;
  height: 15px;
}

/* Feature Text on Screen */
.feature-text {
  position: absolute;
  color: #00ffe5;
  font-weight: bold;
  opacity: 0;
  transition: opacity 0.5s ease;
}
#nfc-text { top: 30%; }
#front-cam-text { top: 40%; }
#sim-text { top: 50%; }
#conn-text { top: 60%; }
#fp-text { top: 70%; }
#ai-text { top: 80%; }

/* Controls */
.controls h2 {
  color: #9fd8ff;
  margin-bottom: 15px;
}
.form-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}
label {
  font-size: 14px;
  color: #9fd8ff;
}
select {
  padding: 6px;
  border-radius: 4px;
  background: #222;
  color: #fff;
  border: 1px solid #444;
  width: 200px;
}


</style>
</head>
<body>
  <form method="post" class="controls">
  
  <div class="inputbox">
  <label>Total Price:</label>
  <input type="text" id="price" value="₹0" readonly name="value6">
</div>

<div id="preloader">
  <div class="logo-container">
    <img src="logo.png" alt="MobiCraft Logo" class="logo-img">
  </div>
</div>

<!-- Header -->
<header>
  <h1>MobiCraft</h1>
  <nav>
    <a href="#home" class="active">Home</a>
    <a href="aboutuspage.html">About</a>
    <a href="contect.html">Contact</a>
     <a href="pricelist.html">Pricelist</a>
     <a href="trackorder.php">Track order</a>
  </nav>
</header>

<!-- Price Box -->

<div class="uttam">
  <div class="container">
    <div class="phone-box">
      <div class="phone">
        <div class="screen">
          <div class="camera-container">
            <div id="front-cam-notch" class="notch"></div>
            <div id="front-cam-dot" class="dot"></div>
            <div id="front-cam-punch" class="punch-hole"></div>
          </div>
          <p class="feature-text" id="nfc-text">NFC: ON</p>
          <p class="feature-text" id="front-cam-text">Camera: Punch-hole</p>
          <p class="feature-text" id="sim-text">SIM: Nano</p>
          <p class="feature-text" id="conn-text">Connectivity: 5G</p>
          <p class="feature-text" id="fp-text">Fingerprint: In-display</p>
          <p class="feature-text" id="ai-text">AI: Yes</p>
        </div>
      </div>
    </div>

    <div class="controls-box">
      <div class="controls">
        <h2>Select Features</h2>
          <form method="post" class="controls">
        <h2>Select Features</h2>

        <div class="form-row">
          <label for="fp">Fingerprint Sensor</label>
          <select id="fp" name="fp">
           
            <option value="display" <?php if($fp=="display") echo "selected"; ?>>In-display</option>
            <option value="side" <?php if($fp=="side") echo "selected"; ?>>Side</option>
          </select>
        </div>

        <div class="form-row">
          <label for="sim">SIM Type</label>
          <select id="sim" name="sim">
           
            <option value="nano" <?php if($sim=="nano") echo "selected"; ?>>Nano</option>
            <option value="hybrid" <?php if($sim=="hybrid") echo "selected"; ?>>Hybrid</option>
          </select>
        </div>

        <div class="form-row">
          <label for="conn">Connectivity</label>
          <select id="conn" name="conn">
       
            <option value="4g" <?php if($conn=="4g") echo "selected"; ?>>4G</option>
            <option value="5g" <?php if($conn=="5g") echo "selected"; ?>>5G</option>
          </select>
        </div>

        <div class="form-row">
          <label for="ai">AI Features</label>
          <select id="ai" name="ai">
            <option value="none" <?php if($ai=="none") echo "selected"; ?>>No</option>
            <option value="yes" <?php if($ai=="yes") echo "selected"; ?>>Yes</option>
          </select>
        </div>

        <div class="form-row">
          <label for="nfc">NFC</label>
          <select id="nfc" name="nfc">
            <option value="none" <?php if($nfc=="none") echo "selected"; ?>>No</option>
            <option value="yes" <?php if($nfc=="yes") echo "selected"; ?>>Yes</option>
          </select>
        </div>

        <div class="form-row">
          <label for="camera">Front Camera</label>
          <select id="camera" name="camera">
            
            <option value="dot" <?php if($camera=="dot") echo "selected"; ?>>Dot Notch</option>
            <option value="punch-hole" <?php if($camera=="punch-hole") echo "selected"; ?>>Punch-hole</option>
            <option value="notch" <?php if($camera=="notch") echo "selected"; ?>>Display Notch</option>
          </select>
        </div>

        <!-- Hidden price field (updated by JS) -->
        <input type="hidden" id="price" name="price" value="<?php echo $price; ?>">

        <br>
         <button type="submit" class="next-btn">Next →</button>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>
<button class="previs" onclick="window.location.href='battary.php'">← previus</button>

<script>
// Update Phone + Price
 let lastTotal = <?php echo (int)$value5; ?>; 
function updatePhone() {
  const features = {
    fp: document.getElementById('fp').value,
    sim: document.getElementById('sim').value,
    conn: document.getElementById('conn').value,
    ai: document.getElementById('ai').value,
    nfc: document.getElementById('nfc').value,
    camera: document.getElementById('camera').value
  };

  // Hide all camera types
  document.getElementById('front-cam-notch').style.display = 'none';
  document.getElementById('front-cam-dot').style.display = 'none';
  document.getElementById('front-cam-punch').style.display = 'none';

  // Show selected camera type
  if (features.camera === 'notch') {
    document.getElementById('front-cam-notch').style.display = 'block';
  } else if (features.camera === 'dot') {
    document.getElementById('front-cam-dot').style.display = 'block';
  } else if (features.camera === 'punch-hole') {
    document.getElementById('front-cam-punch').style.display = 'block';
  }
  
  // Update feature texts
  document.getElementById('nfc-text').style.opacity = features.nfc === 'yes' ? 1 : 0;
  document.getElementById('sim-text').style.opacity = features.sim === 'none' ? 0 : 1;
  document.getElementById('conn-text').style.opacity = features.conn === 'none' ? 0 : 1;
  document.getElementById('fp-text').style.opacity = features.fp === 'none' ? 0 : 1;
  document.getElementById('ai-text').style.opacity = features.ai === 'yes' ? 1 : 0;
  document.getElementById('front-cam-text').style.opacity = features.camera === 'none' ? 0 : 1;
  
  document.getElementById('nfc-text').textContent = `NFC: ${features.nfc.toUpperCase()}`;
  document.getElementById('front-cam-text').textContent = `Camera: ${features.camera}`;
  document.getElementById('sim-text').textContent = `SIM: ${features.sim}`;
  document.getElementById('conn-text').textContent = `Connectivity: ${features.conn.toUpperCase()}`;
  document.getElementById('fp-text').textContent = `Fingerprint: ${features.fp}`;
  document.getElementById('ai-text').textContent = `AI: ${features.ai.toUpperCase()}`;

  // --- PRICE CALCULATION ---
  let price = 0;
  Object.values(features).forEach(val => {
    if (val !== "none") price += <?php echo (int)$row['function']?>;
  });
   let grandTotal = lastTotal + price;

  document.getElementById('price').value = grandTotal;
}

// Attach update to all select menus
document.querySelectorAll('select').forEach(select => {
  select.addEventListener('change', updatePhone);
});

// Run on page load
updatePhone();
</script>
<script src="preloder.js"></script>
</body>
</html>
