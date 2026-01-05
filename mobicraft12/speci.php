<?php
session_start();
$value2  = $_SESSION['value2']     ?? "";
// Save data if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['processor'] = $_POST['processor'];
    $_SESSION['ram']       = $_POST['ram'];
    $_SESSION['rom']       = $_POST['rom'];
    $_SESSION['gpu']       = $_POST['gpu'];
     $_SESSION['value3']  = $_POST['value3'];

    header("Location: camara.php"); // go to next page
    exit;
}

// Restore values if already saved in session
$processor = $_SESSION['processor'] ?? "medG95";
$ram       = $_SESSION['ram'] ?? "8";
$rom       = $_SESSION['rom'] ?? "128";
$gpu       = $_SESSION['gpu'] ?? "balanced";
$value3  = $_SESSION['value3']     ?? "";
include 'priceview.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Live Mobile Studio</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="pricebox.css">
<style>
.kishu {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}
h1 {
  margin: 10px auto;
  color: #7fdbff;
}
.container {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  max-width: 1000px;
  width: 100%;
  justify-content: center;
  align-items: flex-start;
  
}
.panel {
  flex: 1 1 300px;
  max-width: 350px;
  background: #101726;
  padding: 20px;
  border-radius: 12px;
  height: 600px;
  margin-right: 50px;
   box-shadow: 0 5px 20px gray;
}
.panel h2 {
  margin: 0 0 15px 0;
  color: #7fdbff;
  letter-spacing: 1px;
}
.panel label {
  display: block;
  margin-top: 12px;
  letter-spacing: 1px;
}
.panel select {
  width: 100%;
  padding: 8px;
  border-radius: 6px;
  border: 0;
  background: #141b25;
  color: #fff;
  margin-top: 5px;
  letter-spacing: 1px;
}
.phone {
  flex: 1 1 300px;
  min-width: 250px;
  max-width: 400px;
  background: #0a0a0a;
  border-radius: 80px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
 box-shadow: 0 5px 20px gray;
}
.screen {
  width: 80%;
  max-width: 320px;
  height: 500px;
  aspect-ratio: 9/19;
  background: #14171a;
  border-radius: 60px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-size: 16px;
  padding: 20px;
  box-sizing: border-box;
  letter-spacing: 1px;
  border: 10px solid black;
}
.detail {
  margin: 6px 0;
  font-weight: 500;
  letter-spacing: 1px;
  text-align: center;
  word-break: break-word;
}
.bar-container {
  width: 100%;
  margin-top: 20px;
}
.bar-row {
  display: flex;
  align-items: center;
  margin-top: 10px;
}
.bar-name {
  width: 60px;
  font-size: 14px;
  letter-spacing: 1px;
}
.bar-bg {
  flex: 1;
  height: 14px;
  background: #222;
  border-radius: 7px;
  margin: 0 5px;
  overflow: hidden;
}
.bar-fill {
  height: 100%;
  background: #7fdbff;
  width: 0;
  transition: width 0.3s;
}
.bar-val {
  width: 50px;
  text-align: right;
  font-size: 14px;
  letter-spacing: 1px;
}
/* Price Box */

@media (max-width: 768px) {
  .container { flex-direction: column; align-items: center; }
  .panel, .phone { width: 90%; max-width: 350px; }
  .screen { max-width: 300px; aspect-ratio: 9/19; }
}
</style>
</head>
<body>
   <form method="post">
<!-- Price Box -->
<div class="inputbox">
  <label>Total Price:</label>
  <input type="text" id="price" value="" name="value3" readonly>
</div>

<div id="preloader">
  <div class="logo-container">
    <img src="logo.png" alt="MobiCraft Logo" class="logo-img">
  </div>
</div>

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
<h1>Live Mobile Studio</h1>

<div class="container">
  <div class="panel">
    <h2>Customize Your Phone</h2>

    <!-- Form start -->
   
      <label>Processor</label>
      <select id="processor" name="processor">
        <option value="medG95"     <?php if($processor=="medG95") echo "selected"; ?>>MediaTek Helio G95</option>
        <option value="snap870"    <?php if($processor=="snap870") echo "selected"; ?>>Snapdragon 870</option>
        <option value="snap888"    <?php if($processor=="snap888") echo "selected"; ?>>Snapdragon 888</option>
        <option value="exynos2200" <?php if($processor=="exynos2200") echo "selected"; ?>>Exynos 2200</option>
        <option value="kirin9000"  <?php if($processor=="kirin9000") echo "selected"; ?>>Kirin 9000</option>
        <option value="snap8gen1"  <?php if($processor=="snap8gen1") echo "selected"; ?>>Snapdragon 8 Gen 1</option>
        <option value="dim8000"    <?php if($processor=="dim8000") echo "selected"; ?>>Dimensity 8000</option>
        <option value="snap8gen2"  <?php if($processor=="snap8gen2") echo "selected"; ?>>Snapdragon 8 Gen 2</option>
        <option value="appleA15"   <?php if($processor=="appleA15") echo "selected"; ?>>Apple A15</option>
        <option value="appleA16"   <?php if($processor=="appleA16") echo "selected"; ?>>Apple A16</option>
      </select>

      <label>RAM</label>
      <select id="ram" name="ram">
        <option value="4"  <?php if($ram=="4") echo "selected"; ?>>4 GB</option>
        <option value="8"  <?php if($ram=="8") echo "selected"; ?>>8 GB</option>
        <option value="12" <?php if($ram=="12") echo "selected"; ?>>12 GB</option>
        <option value="16" <?php if($ram=="16") echo "selected"; ?>>16 GB</option>
      </select>

      <label>ROM</label>
      <select id="rom" name="rom">
        <option value="64"   <?php if($rom=="64") echo "selected"; ?>>64 GB</option>
        <option value="128"  <?php if($rom=="128") echo "selected"; ?>>128 GB</option>
        <option value="256"  <?php if($rom=="256") echo "selected"; ?>>256 GB</option>
        <option value="512"  <?php if($rom=="512") echo "selected"; ?>>512 GB</option>
        <option value="1024" <?php if($rom=="1024") echo "selected"; ?>>1 TB</option>
      </select>

      <label>GPU Mode</label>
      <select id="gpu" name="gpu">
        <option value="balanced"    <?php if($gpu=="balanced") echo "selected"; ?>>Balanced</option>
        <option value="performance" <?php if($gpu=="performance") echo "selected"; ?>>Performance</option>
        <option value="power"       <?php if($gpu=="power") echo "selected"; ?>>Power Save</option>
      </select>

      <br><br>
      <button type="submit" class="next-btn">Next →</button>
    </form>
  </div>

  <div class="phone">
    <div class="screen" id="screen">
      <div class="detail" id="dProc">Processor: —</div>
      <div class="detail" id="dCPU">CPU Score: —</div>
      <div class="detail" id="dRAM">RAM: —</div>
      <div class="detail" id="dROM">ROM: —</div>
      <div class="detail" id="dGPU">GPU Mode: —</div>
    </div>
    <div class="bar-container">
      <div class="bar-row">
        <div class="bar-name">RAM</div>
        <div class="bar-bg"><div id="ramBar" class="bar-fill"></div></div>
        <div id="ramVal" class="bar-val">8GB</div>
      </div>
      <div class="bar-row">
        <div class="bar-name">ROM</div>
        <div class="bar-bg"><div id="romBar" class="bar-fill"></div></div>
        <div id="romVal" class="bar-val">128GB</div>
      </div>
      <div class="bar-row">
        <div class="bar-name">CPU</div>
        <div class="bar-bg"><div id="cpuBar" class="bar-fill"></div></div>
        <div id="cpuVal" class="bar-val">0k</div>
      </div>
    </div>
  </div>
</div>
</div>

    <button class="previs" onclick="window.location.href='screen.php'">← previus</button>

<script>
// Previous page total
var lastTotal = <?php echo (int)$value2; ?>;


// Processor scores and prices
var processorMedG95Score = 300000;
var processorMedG95Price = <?php echo (int)$row['mediatekg95'];?>;

var processorSnap870Score = 650000;
var processorSnap870Price = <?php echo (int)$row['snapdragan870'];?>;

var processorSnap888Score = 730000;
var processorSnap888Price = <?php echo (int)$row['snapdragan888'];?>;

var processorExynos2200Score = 800000;
var processorExynos2200Price = <?php echo (int)$row['exynos2200'];?>;

var processorKirin9000Score = 880000;
var processorKirin9000Price = <?php echo (int)$row['kirin9000'];?>;

var processorSnap8Gen1Score = 950000;
var processorSnap8Gen1Price = <?php echo (int)$row['snapdragan8gen1'];?>;

var processorDim8000Score = 980000;
var processorDim8000Price = <?php echo (int)$row['dimensity8000'];?>;

var processorSnap8Gen2Score = 1050000;
var processorSnap8Gen2Price = <?php echo (int)$row['snapdragan8gen2'];?>;

var processorAppleA15Score = 1200000;
var processorAppleA15Price = <?php echo (int)$row['a15'];?>;

var processorAppleA16Score = 1450000;
var processorAppleA16Price = <?php echo (int)$row['a16'];?>;

// RAM prices
var ram4Price = <?php echo (int)$row['4gb'];?>;
var ram8Price = <?php echo (int)$row['8gb'];?>;
var ram12Price = <?php echo (int)$row['12gb'];?>;
var ram16Price = <?php echo (int)$row['16gb'];?>;

// ROM prices
var rom64Price = <?php echo (int)$row['64gb'];?>;
var rom128Price = <?php echo (int)$row['128gb'];?>;
var rom256Price = <?php echo (int)$row['256gb'];?>;
var rom512Price = <?php echo (int)$row['512gb'];?>;
var rom1024Price = <?php echo (int)$row['1tb'];?>;

function update() {
    var processor = document.getElementById('processor').value;
    var ram = Number(document.getElementById('ram').value);
    var rom = Number(document.getElementById('rom').value);
    var gpu = document.getElementById('gpu').value;

    // CPU Score and Price
    var cpuScore = 0;
    var cpuPrice = 0;
    if (processor == "medG95") {
        cpuScore = processorMedG95Score;
        cpuPrice = processorMedG95Price;
    } else if (processor == "snap870") {
        cpuScore = processorSnap870Score;
        cpuPrice = processorSnap870Price;
    } else if (processor == "snap888") {
        cpuScore = processorSnap888Score;
        cpuPrice = processorSnap888Price;
    } else if (processor == "exynos2200") {
        cpuScore = processorExynos2200Score;
        cpuPrice = processorExynos2200Price;
    } else if (processor == "kirin9000") {
        cpuScore = processorKirin9000Score;
        cpuPrice = processorKirin9000Price;
    } else if (processor == "snap8gen1") {
        cpuScore = processorSnap8Gen1Score;
        cpuPrice = processorSnap8Gen1Price;
    } else if (processor == "dim8000") {
        cpuScore = processorDim8000Score;
        cpuPrice = processorDim8000Price;
    } else if (processor == "snap8gen2") {
        cpuScore = processorSnap8Gen2Score;
        cpuPrice = processorSnap8Gen2Price;
    } else if (processor == "appleA15") {
        cpuScore = processorAppleA15Score;
        cpuPrice = processorAppleA15Price;
    } else if (processor == "appleA16") {
        cpuScore = processorAppleA16Score;
        cpuPrice = processorAppleA16Price;
    }

    // RAM price
    var ramPrice = 0;
    if (ram == 4) ramPrice = ram4Price;
    if (ram == 8) ramPrice = ram8Price;
    if (ram == 12) ramPrice = ram12Price;
    if (ram == 16) ramPrice = ram16Price;

    // ROM price
    var romPrice = 0;
    if (rom == 64) romPrice = rom64Price;
    if (rom == 128) romPrice = rom128Price;
    if (rom == 256) romPrice = rom256Price;
    if (rom == 512) romPrice = rom512Price;
    if (rom == 1024) romPrice = rom1024Price;

    // Update UI
    document.getElementById('dProc').textContent = "Processor: " + processor;
    document.getElementById('dCPU').textContent = "CPU Score: " + Math.round(cpuScore/1000) + "k";
    document.getElementById('dRAM').textContent = "RAM: " + ram + "GB";
    document.getElementById('dROM').textContent = "ROM: " + rom + "GB";
    document.getElementById('dGPU').textContent = "GPU Mode: " + gpu;

    document.getElementById('ramBar').style.width = (ram/16*100) + "%";
    document.getElementById('romBar').style.width = (rom/1024*100) + "%";
    document.getElementById('cpuBar').style.width = Math.min(100, cpuScore/1600000*100) + "%";

    document.getElementById('ramVal').textContent = ram + "GB";
    document.getElementById('romVal').textContent = rom + "GB";
    document.getElementById('cpuVal').textContent = Math.round(cpuScore/1000) + "k";

    // Price calculation
    var total = cpuPrice + ramPrice + romPrice;
    var grandTotal = lastTotal + total;
    document.getElementById('price').value = grandTotal;
}

// Add event listeners
document.getElementById('processor').addEventListener('change', update);
document.getElementById('ram').addEventListener('change', update);
document.getElementById('rom').addEventListener('change', update);
document.getElementById('gpu').addEventListener('change', update);

// Initial update
update();
</script>

<script src="preloder.js"></script>
</body>
</html>
