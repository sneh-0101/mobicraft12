<?php
session_start();

// --- Design face ---
$screen    = $_SESSION['screen']   ?? 5;
$corners   = $_SESSION['corners']  ?? 20;
$thick     = $_SESSION['thick']    ?? 7;
$power     = $_SESSION['power']    ?? "right";
$vol       = $_SESSION['vol']      ?? "left";
$speaker   = $_SESSION['speaker']  ?? "bottom";

// --- Screen face ---
$type    = $_SESSION['type']    ?? "flat";
$refresh = $_SESSION['refresh'] ?? 60;
$bright  = $_SESSION['bright']  ?? 1000;
$res     = $_SESSION['res']     ?? "1080";

// --- Specification face ---
$processor = $_SESSION['processor'] ?? "medG95";
$ram       = $_SESSION['ram'] ?? "8";
$rom       = $_SESSION['rom'] ?? "128";
$gpu       = $_SESSION['gpu'] ?? "balanced";

// --- Back Camera face ---
$cameraPosition = $_SESSION['cameraPosition'] ?? "left";
$cameraCount    = $_SESSION['cameraCount'] ?? "1";
$moduleShape    = $_SESSION['moduleShape'] ?? "square";
$cameraStyle    = $_SESSION['cameraStyle'] ?? "circle";
$mainMP         = $_SESSION['mainMP'] ?? "50";
$microMP        = $_SESSION['microMP'] ?? "10";
$teleMP         = $_SESSION['teleMP'] ?? "12";
$backlight      = $_SESSION['backlight'] ?? "off";

// --- Battery options ---
$mah          = $_SESSION['battery_capacity'] ?? 4000;
$watt         = $_SESSION['wired_watt'] ?? 20;
$batteryType  = $_SESSION['battery_type'] ?? "Lithium-ion";
$wireless     = $_SESSION['wireless'] ?? "No";
$wirelessWatt = $_SESSION['wireless_watt'] ?? 10;
$batteryPrice = $_SESSION['battery_price'] ?? 0;

// --- Functions face ---
$fp     = $_SESSION['fp'] ?? "none";
$sim    = $_SESSION['sim'] ?? "none";
$conn   = $_SESSION['conn'] ?? "none";
$ai     = $_SESSION['ai'] ?? "none";
$nfc    = $_SESSION['nfc'] ?? "none";
$camera = $_SESSION['camera'] ?? "none";

// --- Back design face ---
$material = $_SESSION['material'] ?? "glass";
$color    = $_SESSION['color'] ?? "#1a1a1a";
$design   = $_SESSION['design'] ?? "none";
$price    = $_SESSION['price'] ?? "₹0";
$value7   = $_SESSION['value7'] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MobiCraft - Details</title>
  <link rel="stylesheet" href="preloder.css">
  <link rel="stylesheet" href="theme.css">
  <link rel="stylesheet" href="navbar1.css"> 
  <link rel="stylesheet" href="button.css">
  <link rel="stylesheet" href="pricebox.css">
  <link rel="stylesheet" href="animations.css">
  <style>
    .section-box {
        background: rgba(255, 255, 255, 0.07);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 12px;
      padding: 20px;
      margin: 15px auto;
      max-width: 900px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    h2 {
      margin-bottom: 10px;
      border-bottom: 2px solid #ddd;
      padding-bottom: 5px;
      font-size: 20px;
    }
    .spec-list {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 8px 20px;
      font-size: 16px;
    }
    .spec-list div { 
      padding: 4px 0;
    }
    @media(max-width:768px){
      .spec-list {
        grid-template-columns: 1fr;
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
    <nav>
      <a href="home.html">Home</a>
      <a href="aboutuspage.html">About</a>
      <a href="contact.html">Contact</a>
      <a href="pricelist.html">Pricelist</a>
      <a href="trackorder.php">Track Order</a>
    </nav>
  </header>

  <!-- Content Sections -->
  <main>
    <div class="section-box">
      <h2>Design Features</h2>
      <div class="spec-list">
        <div>Screen Size: <?= $screen ?> inch</div>
        <div>Corner Radius: <?= $corners ?> mm</div>
        <div>Thickness: <?= $thick ?> mm</div>
        <div>Power Button: <?= $power ?></div>
        <div>Volume Button: <?= $vol ?></div>
        <div>Speaker: <?= $speaker ?></div>
      </div>
    </div>

    <div class="section-box">
      <h2>Screen</h2>
      <div class="spec-list">
        <div>Type: <?= $type ?></div>
        <div>Refresh Rate: <?= $refresh ?> Hz</div>
        <div>Brightness: <?= $bright ?> nits</div>
        <div>Resolution: <?= $res ?>p</div>
      </div>
    </div>

    <div class="section-box">
      <h2>Specifications</h2>
      <div class="spec-list">
        <div>Processor: <?= $processor ?></div>
        <div>RAM: <?= $ram ?> GB</div>
        <div>ROM: <?= $rom ?> GB</div>
        <div>GPU: <?= $gpu ?></div>
      </div>
    </div>

    <div class="section-box">
      <h2>Back Camera</h2>
      <div class="spec-list">
        <div>Position: <?= $cameraPosition ?></div>
        <div>Count: <?= $cameraCount ?></div>
        <div>Module Shape: <?= $moduleShape ?></div>
        <div>Style: <?= $cameraStyle ?></div>
        <div>Main Camera: <?= $mainMP ?> MP</div>
        <div>Micro Camera: <?= $microMP ?> MP</div>
        <div>Tele Camera: <?= $teleMP ?> MP</div>
        <div>Backlight: <?= $backlight ?></div>
      </div>
    </div>

    <div class="section-box">
      <h2>Battery</h2>
      <div class="spec-list">
        <div>Capacity: <?= $mah ?> mAh</div>
        <div>Wired Charging: <?= $watt ?> W</div>
        <div>Type: <?= $batteryType ?></div>
        <div>Wireless Charging: <?= $wireless ?> (<?= $wirelessWatt ?>W)</div>
  
      </div>
    </div>

    <div class="section-box">
      <h2>Functions</h2>
      <div class="spec-list">
        <div>Fingerprint: <?= $fp ?></div>
        <div>SIM: <?= $sim ?></div>
        <div>Connectivity: <?= $conn ?></div>
        <div>AI: <?= $ai ?></div>
        <div>NFC: <?= $nfc ?></div>
        <div>Front Camera: <?= $camera ?></div>
      </div>
    </div>

    <div class="section-box">
      <h2>Back Design</h2>
      <div class="spec-list">
        <div>Material: <?= $material ?></div>
        <div>Color: <span style="display:inline-block;width:20px;height:20px;background:<?= $color ?>;border:1px solid #333;"></span> <?= $color ?></div>
        <div>Design: <?= $design ?></div>
        <div>Total Price: <?php echo $value7 ?></div>
      </div>
    </div>
  </main>
    <button class="previs" onclick="window.location.href='back.php'">← previus</button>
  <button class="next-btn" onclick="window.location.href='aplication.php'">Next</button>

  <script src="preloder.js"></script>
</body>
</html>
