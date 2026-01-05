<?php
session_start();
$value3  = $_SESSION['value3'] ?? "";

// Save form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['cameraPosition'] = $_POST['cameraPosition'];
    $_SESSION['cameraCount']    = $_POST['cameraCount'];
    $_SESSION['moduleShape']    = $_POST['moduleShape'];
    $_SESSION['cameraStyle']    = $_POST['cameraStyle'];
    $_SESSION['mainMP']         = $_POST['mainMP'];
    $_SESSION['microMP']        = $_POST['microMP'];
    $_SESSION['teleMP']         = $_POST['teleMP'];
    $_SESSION['backlight']      = $_POST['backlight'];
    $_SESSION['value4']         = $_POST['value4'];

    header("Location: battary.php");
    exit;
}

// Restore values if already saved in session
$cameraPosition = $_SESSION['cameraPosition'] ?? "left";
$cameraCount    = $_SESSION['cameraCount'] ?? "1";
$moduleShape    = $_SESSION['moduleShape'] ?? "square";
$cameraStyle    = $_SESSION['cameraStyle'] ?? "circle";
$mainMP         = $_SESSION['mainMP'] ?? "50";
$microMP        = $_SESSION['microMP'] ?? "10";
$teleMP         = $_SESSION['teleMP'] ?? "12";
$backlight      = $_SESSION['backlight'] ?? "off";
$value4         = $_SESSION['value4'] ?? "";
include 'priceview.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Camera Customizer</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="pricebox.css">
<link rel="stylesheet" href="animations.css">
<style>
.kishu {
    display: flex;
    flex-direction: column;
    align-items: center;
}
h1 { margin-bottom: 20px; }
.wrap {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 20px;
    width: 100%;
    max-width: 1000px;
    box-shadow: 0 5px 20px gray;
    border-radius: 30px;
}
@media (max-width: 900px) {
    .wrap { grid-template-columns: 1fr; }
}
.preview-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.phone {
    width: 250px;
    height: 500px;
    background: linear-gradient(#000, #111);
    border-radius: 30px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding-top: 20px;
}

/* ✅ Wrapper for module + nk */
.module-wrapper {
    position: absolute;
    top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: all 0.3s ease;
}

/* Camera Module */
.camera-module {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    width: 100px;
    height: 100px;
    background: #222;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
}
.camera {
    width: 28px;
    height: 28px;
    background: #000;
    border: 2px solid #555;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 9px;
    color: #0f0;
    transition: all 0.3s ease;
}

/* nk now inside wrapper */
.nk {
    width: 20px;
    height: 10px;
    border-radius: 50px;
    border: 1px solid whitesmoke;
    margin-top: -20px;
    margin-right: -80px;
    transform: rotate(120deg);
    background-color: whitesmoke;
  
}

/* uk logo */
.uk {
    margin-top: 350px;
}

/* 🔹 Backlight */
.backlight {
    border: 2px solid #ccc;
    box-shadow: 0 0 10px rgba(255,255,200,0.5);
    background: #222;
}
.backlight {
    box-shadow: 0 0 20px 6px #00e5ff inset;
    border: 2px solid #00e5ff;
}

/* Controls */
.controls {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    padding: 20px;
}
label { display: block; margin-top: 12px; font-size: 13px; }
select, input {
    width: 100%;
    padding: 8px;
    border-radius: 6px;
    background: #131822;
    color: #eaf6ff;
    border: none;
    margin-top: 4px;
}
input[type=range] { accent-color: #00e5ff; }

/* Shapes */
.camera-module.square {
    clip-path: polygon(50% -10%, 90% 10%, 100% 50%, 70% 100%, 0% 100%, 0% 30%);
    background: linear-gradient(135deg, #00ffff, #ff0080);
}

.camera-module.hexagon {
    clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 70% 100%, 25% 100%, 0% 50%);
    background: linear-gradient(135deg, #00ffff, #64af08ff);
}
.camera-module.futuristic {
    clip-path: polygon(10% 0%, 90% 0%, 100% 40%, 60% 100%, 40% 100%, 0 40%);
    background: linear-gradient(45deg,#ff00ff,#00ffff);
}
</style>
</head>
<body>
<form method="post">
<div class="inputbox">
  <label>Total Price:</label>
  <input type="text" id="price" value="" name="value4" readonly>
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
<h1>MobiCraft Camera Customizer</h1>

<div class="wrap">
  <div class="preview-card">
    <div class="phone">
      <!-- ✅ wrapper holds module + nk -->
      <div id="moduleWrapper" class="module-wrapper">
        <div id="cameraModule" class="camera-module"></div>
        <div class="nk"></div>
      </div>
      <div class="uk"><img src="logo.png" height="100px" width="100px"> </div>
    </div>
  </div>

  <div class="controls">
      <label>Camera Position</label>
      <select name="cameraPosition" id="cameraPosition">
        <option value="left"   <?php if($cameraPosition=="left") echo "selected"; ?>>Top Left</option>
        <option value="middle" <?php if($cameraPosition=="middle") echo "selected"; ?>>Top Middle</option>
      </select>

      <label>Number of Cameras</label>
      <select name="cameraCount" id="cameraCount">
        <option value="1" <?php if($cameraCount=="1") echo "selected"; ?>>1 Camera</option>
        <option value="2" <?php if($cameraCount=="2") echo "selected"; ?>>2 Cameras</option>
        <option value="3" <?php if($cameraCount=="3") echo "selected"; ?>>3 Cameras</option>
      </select>

      <label>Module Shape</label>
      <select name="moduleShape" id="moduleShape">
        <option value="square" <?php if($moduleShape=="square") echo "selected"; ?>>Square</option>
       
        <option value="hexagon"<?php if($moduleShape=="hexagon") echo "selected"; ?>>Hexagon</option>
        <option value="futuristic"<?php if($moduleShape=="futuristic") echo "selected"; ?>>Futuristic</option>
      </select>

      <label>Camera Style</label>
      <select name="cameraStyle" id="cameraStyle">
        <option value="circle" <?php if($cameraStyle=="circle") echo "selected"; ?>>Circle Lens</option>
        <option value="square" <?php if($cameraStyle=="square") echo "selected"; ?>>Square Lens</option>
      </select>

      <label>Main Camera MP</label>
      <input type="range" name="mainMP" id="mainMP" min="10" max="108" value="<?php echo $mainMP; ?>">

      <div id="extraCameras">
        <label>Micro Camera MP</label>
        <input type="range" name="microMP" id="microMP" min="5" max="20" value="<?php echo $microMP; ?>">
        <label>Telephoto Camera MP</label>
        <input type="range" name="teleMP" id="teleMP" min="5" max="25" value="<?php echo $teleMP; ?>">
      </div>

      <label>Backlight</label>
      <select name="backlight" id="backlight">
        <option value="off" <?php if($backlight=="off") echo "selected"; ?>>Off</option>
        <option value="on"  <?php if($backlight=="on") echo "selected"; ?>>On</option>
      </select>
  

      <br><br>
      <button type="submit" class="next-btn">Next →</button>
  </div>
</div>
</div>

<button class="previs" onclick="window.location.href='speci.php'">← previous</button>

<script>
let lastTotal = <?php echo (int)$value3; ?>; 
const moduleWrapper = document.getElementById("moduleWrapper");
const cameraModule = document.getElementById("cameraModule");
const cameraCountEl = document.getElementById("cameraCount");
const moduleShapeEl = document.getElementById("moduleShape");
const cameraStyleEl = document.getElementById("cameraStyle");
const mainMPEl = document.getElementById("mainMP");
const microMPEl = document.getElementById("microMP");
const teleMPEl = document.getElementById("teleMP");
const backlightEl = document.getElementById("backlight");
const cameraPositionEl = document.getElementById("cameraPosition");
const priceBox = document.getElementById("price");

function calculatePrice() {
  let price = 0;
  if (cameraCountEl.value === "1") price +=<?php echo (int)$row['camera1'] ?>;
  if (cameraCountEl.value === "2") price += <?php echo (int)$row['camera2'] ?>;
  if (cameraCountEl.value === "3") price +=<?php echo (int)$row['camera3'] ?>;

  price += 1000;
  price += parseInt(mainMPEl.value) * <?php echo (int)$row['permg'] ?>;
  if (parseInt(cameraCountEl.value) >= 2) price += parseInt(microMPEl.value) * <?php echo (int)$row['permg'] ?>;
  if (parseInt(cameraCountEl.value) >= 3) price += parseInt(teleMPEl.value) * <?php echo (int)$row['permg'] ?>;

  priceBox.value = lastTotal + price;
}

function renderModule() {
  cameraModule.innerHTML = "";
  const count = parseInt(cameraCountEl.value);

  cameraModule.className = "camera-module " + moduleShapeEl.value;

  // ✅ Move wrapper instead of only camera module
  if (cameraPositionEl.value === "left") {
    moduleWrapper.style.left = "20px";
    moduleWrapper.style.right = "auto";
    moduleWrapper.style.transform = "none";
  } else {
    moduleWrapper.style.left = "50%";
    moduleWrapper.style.right = "auto";
    moduleWrapper.style.transform = "translateX(-50%)";
  }

  for (let i = 0; i < count; i++) {
    const cam = document.createElement("div");
    cam.className = "camera";
    cam.style.borderRadius = cameraStyleEl.value==="square"?"5px":"50%";
    cam.innerText = i===0 ? mainMPEl.value+"MP" : i===1 ? microMPEl.value+"MP" : teleMPEl.value+"MP";
    cameraModule.appendChild(cam);
  }

  cameraModule.classList.toggle("backlight", backlightEl.value==="on");

  calculatePrice();
}

[cameraCountEl,moduleShapeEl,cameraStyleEl,mainMPEl,microMPEl,teleMPEl,backlightEl,cameraPositionEl].forEach(el=>{
  el.addEventListener("input", renderModule);
});

renderModule();
</script>
<script src="preloder.js"></script>
<script src="drag-animations.js"></script>
</body>
</html>
