<?php
session_start();
$value4  = $_SESSION['value4']     ?? "";

// Save data if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['battery_capacity'] = $_POST['mah'];
    $_SESSION['wired_watt']       = $_POST['watt'];
    $_SESSION['battery_type']     = $_POST['type'];
    $_SESSION['wireless']         = $_POST['wireless'];
    $_SESSION['wireless_watt']    = $_POST['wirelessWatt'] ?? 0;
    $_SESSION['value5']  = $_POST['value5'];

  

    header("Location: functions.php");
    exit;
}

// Restore values if already set
$mah          = $_SESSION['battery_capacity'] ?? 4000;
$watt         = $_SESSION['wired_watt'] ?? 20;
$type         = $_SESSION['battery_type'] ?? "Lithium-ion";
$wireless     = $_SESSION['wireless'] ?? "No";
$wirelessWatt = $_SESSION['wireless_watt'] ?? 10;
$price        = $_SESSION['battery_price'] ?? 0;
$value5  = $_SESSION['value5']     ?? "";
include 'priceview.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Phone Battery Designer</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="pricebox.css">
<link rel="stylesheet" href="animations.css">
<style>
  .kishu{
    color: #e9faff;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }

  .wrap {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    max-width: 1000px;
    width:auto;
    box-shadow: 0 5px 20px gray;
    border-radius: 50px;
  }

  .preview, .controls {
    background: rgba(255,255,255,0.05);
    padding: 20px;
    border-radius: 12px;
    width: 500px;
    border-radius: 50px;
  }

  .preview {
    width: 360px;
    display: flex;
    justify-content: center;
    position: relative;
  }

  .phone {
    width: 80%;
    height: 520px;
    background: #111;
    border-radius: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .screen {
    width: 88%;
    height: 70%;
    background: #0d111b;
    border-radius: 16px;
    padding: 10px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 10px;
  }

  .battery-bar {
    width: 80%;
    height: 20px;
    border: 2px solid #00e5ff;
    border-radius: 10px;
    margin: auto;
  }

  .battery-fill {
    height: 100%;
    width: 0%;
    background: #00e5ff;
    transition: width 0.5s;
  }

  .big {font-weight: bold; color: #00f0ff;}
  label {margin-top: 10px; display: block;}
  input, select {width: 100%; padding: 6px; margin-top: 4px; border-radius: 6px; border: none; background: #131822; color: #00ffe5;}
  .hidden {display: none;}

  /* Price Box */
  
</style>
</head>
<body>
  <form method="post">
  <!-- Price Box -->
<div class="inputbox">
  <label>Total Price:</label>
  <input type="text" id="price" value="<?php echo $value5 ?>" readonly name="value5">
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

<div class="kishu">
<h1>Phone Battery Designer</h1>



<div class="wrap">
  <!-- Preview -->
  <div class="preview">
    <div class="phone">
      <div class="screen">
        <div class="battery-bar"><div class="battery-fill"></div></div>
        <div class="big mah-text">4000 mAh</div>
        <div class="watt-text">20W Wired</div>
        <div class="type-text">Lithium-ion</div>
        <div class="wireless-text">Wireless: No</div>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <div class="controls">
    <label>Battery Capacity (mAh)</label>
<form method="post">
  <div>
    <label>Battery Capacity (mAh)</label>
    <input type="range" id="mah" name="mah" min="3000" max="7000" step="500" value="<?php echo $mah; ?>">
  </div>

  <div>
    <label>Wired Charging (W)</label>
    <input type="range" id="watt" name="watt" min="5" max="150" step="5" value="<?php echo $watt; ?>">
  </div>

  <div>
    <label>Battery Type</label>
    <select id="type" name="type">
      <option <?php if($type=="Lithium-ion") echo "selected"; ?>>Lithium-ion</option>
      <option <?php if($type=="Lithium-polymer") echo "selected"; ?>>Lithium-polymer</option>
    </select>
  </div>

  <div>
    <label>Wireless Charging</label>
    <select id="wireless" name="wireless">
      <option <?php if($wireless=="No") echo "selected"; ?>>No</option>
      <option <?php if($wireless=="Yes") echo "selected"; ?>>Yes</option>
    </select>
  </div>

  <div id="wirelessWattBox" style="<?php echo $wireless=="Yes"?"":"display:none;"; ?>">
    <label>Wireless Watt</label>
    <input type="range" id="wirelessWatt" name="wirelessWatt" min="5" max="50" step="5" value="<?php echo $wirelessWatt; ?>">
  </div>


  <br><br>
   <button type="submit" class="next-btn">Next →</button>
</form>
    
  </div>
</div>
</div>

  <button class="previs" onclick="window.location.href='camara.php'">← previus</button>
<script>
  let lastTotal = <?php echo (int)$value4; ?>; 
  
const mah = document.getElementById("mah");
const watt = document.getElementById("watt");
const type = document.getElementById("type");
const wireless = document.getElementById("wireless");
const wirelessWatt = document.getElementById("wirelessWatt");
const wirelessWattBox = document.getElementById("wirelessWattBox");

const fill = document.querySelector(".battery-fill");
const mahText = document.querySelector(".mah-text");
const wattText = document.querySelector(".watt-text");
const typeText = document.querySelector(".type-text");
const wirelessText = document.querySelector(".wireless-text");
const priceBox = document.getElementById("price");

function calculatePrice() {
  let price = 0;

  // Battery price: 3000mAh base = 800, +100 per +500mAh
  let baseMah = 3000;
  price +=<?php echo (int)$row['3000mah'] ?> ;
  let extraMah = mah.value - baseMah;
  if (extraMah > 0) {
    price += (extraMah / 500) *<?php echo (int)$row['per500mah'] ?> ;
  }

  // Wired charging price: 5W base = 500, +100 per +5W
  let baseWatt = 5;
  price += <?php echo (int)$row['5w'] ?>;
  let extraWatt = watt.value - baseWatt;
  if (extraWatt > 0) {
    price += (extraWatt / 5) * <?php echo (int)$row['+per5w'] ?>;
  }

  // Wireless charging price: Yes = 2500 base, +200 per +5W
  if (wireless.value === "Yes") {
    price += 2500;
    let extraWireless = wirelessWatt.value - 5;
    if (extraWireless > 0) {
      price += (extraWireless / 5) * 200;
    }
  }

 let grandTotal = lastTotal + price;
   
    // update UI
    
  priceBox.value =  grandTotal;
}

// Battery mAh
mah.addEventListener("input", ()=>{
  let percent = (mah.value - 3000) / (7000 - 3000) * 100;
  fill.style.width = percent + "%";
  mahText.textContent = mah.value + " mAh";
  calculatePrice();
});

// Wired Watt
watt.addEventListener("input", ()=>{
  wattText.textContent = watt.value + "W Wired";
  calculatePrice();
});

// Battery Type
type.addEventListener("change", ()=> typeText.textContent = type.value);

// Wireless
wireless.addEventListener("change", ()=>{
  if(wireless.value === "Yes"){
    wirelessText.textContent = "Wireless: " + wirelessWatt.value + "W";
    wirelessWattBox.classList.remove("hidden");
  } else {
    wirelessText.textContent = "Wireless: No";
    wirelessWattBox.classList.add("hidden");
  }
  calculatePrice();
});

wirelessWatt.addEventListener("input", ()=>{
  if(wireless.value === "Yes"){
    wirelessText.textContent = "Wireless: " + wirelessWatt.value + "W";
    calculatePrice();
  }
});

// Initial price calculation
calculatePrice();
</script>
<script src="preloder.js"></script>
<script src="drag-animations.js"></script>
</body>
</html>
