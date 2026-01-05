<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Save customizer values
    $_SESSION['screen']   = $_POST['screen'];
    $_SESSION['corners']  = $_POST['corners'];
    $_SESSION['thick']    = $_POST['thick'];
    $_SESSION['power']    = $_POST['power'];
    $_SESSION['vol']      = $_POST['vol'];
    $_SESSION['speaker']  = $_POST['speaker'];
   $_SESSION['totalprice']  = $_POST['totalprice'];

    header("Location: screen.php");
    exit;
}
// Restore values if already saved in session

$screen    = $_SESSION['screen']   ?? 5;
$corners   = $_SESSION['corners']  ?? 20;
$thick     = $_SESSION['thick']    ?? 7;
$power     = $_SESSION['power']    ?? "right";
$vol       = $_SESSION['vol']      ?? "left";
$speaker   = $_SESSION['speaker']  ?? "bottom";
$totalprice   = $_SESSION['totalprice']  ?? "2000";

include 'priceview.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Phone Customizer</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css"> 
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="pricebox.css">
<link rel="stylesheet" href="animations.css">
<style>
.wrap {
  flex: 1;
  display: flex;
  gap: 20px;
  padding: 20px;
  box-sizing: border-box;
  position: relative; /* to place price box at top-right */
}



.price-box input {
  width: 120px;
  font-size: 16px;
  text-align: right;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

/* --- your existing styles remain unchanged --- */
.phone-box {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 15px;
}

.phone {
  width: 110px;
  height: 210px;
  background: #111;
  border: 2px solid #7fdbff;
  border-radius: 20px;
  position: relative;
  box-shadow: inset -5px -5px 15px rgba(255, 255, 255, 0.1),
              inset 5px 5px 15px rgba(0, 0, 0, 0.7);
}
.btn {
  width: 6px;
  height: 30px;
  background: #ffae00;
  position: absolute;
  border-radius: 3px;
}
.spk {
  width: 30px;
  height: 6px;
  background: gray;
  position: absolute;
  border-radius: 3px;
}
.right {
  flex: 1.5;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.line {
  flex: 1;
  display: flex;
  gap: 20px;
}
.box {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background: rgba(255, 255, 255, 0.07);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 12px;
  font-size: 16px;
}
input, select {
  width: 80%;
  margin-top: 8px;
}
/* responsive part unchanged */
@media (max-width: 768px) {
  .wrap { flex-direction: column; padding: 10px; gap: 15px; }
  .right { gap: 15px; }
  .line { flex-direction: column; gap: 15px; }
  .phone-box { width: 100%; justify-content: center; }
  .phone { width: 40vw; height: 75vw; }
  .box { width: 100%; font-size: 14px; padding: 10px; }
  input, select { width: 90%; }
  header h1 { font-size: 1.5em; }
  nav { flex-direction: column; align-items: center; }
  nav a { padding: 5px 10px; }
}

</style>
</head>
<body>
  <div class="inputbox">
<form method="post">
    <label>Total price</label>
    <input type="text" id="price" value="₹<?php echo $totalprice; ?>" readonly name="totalprice">
   
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

<h1>Phone Customizer</h1>

<div class="wrap">
  <!-- Price Box -->


  <!-- Phone Preview -->
  <div class="phone-box fade-in">
    <div class="phone phone-animated draggable" id="phone">
      <div class="btn" id="power"></div>
      <div class="btn" id="volume" style="height: 45px; background-color: red;"></div>
      <div class="spk" id="speaker"></div>
    </div>
  </div>


     <!-- Controls -->
    <div class="right slide-in-right">
      <div class="line">
        <div class="box card-animated fade-in-delay-1">
       
            
          Screen <span id="sVal"><?php echo $screen; ?>"</span><br>
          <input type="range" id="s" name="screen" min="5" max="7.5" step="0.1" value="<?php echo $screen; ?>" class="input-animated">
        </div>
        <div class="box card-animated fade-in-delay-2">
          Corners <span id="cVal"><?php echo $corners; ?>px</span><br>
          <input type="range" id="c" name="corners" min="0" max="60" value="<?php echo $corners; ?>" class="input-animated">
        </div>
      </div>
      <div class="line">
        <div class="box card-animated fade-in-delay-3">
          Thick <span id="tVal"><?php echo $thick; ?>mm</span><br>
          <input type="range" id="t" name="thick" min="5" max="12" value="<?php echo $thick; ?>" class="input-animated">
        </div>
        <div class="box card-animated fade-in-delay-1">
          Power 
          <select id="p" name="power" class="input-animated">
            <option value="right" <?php if($power=="right") echo "selected"; ?>>right</option>
            <option value="left" <?php if($power=="left") echo "selected"; ?>>left</option>
          </select><br>
          Vol 
          <select id="v" name="vol" class="input-animated">
            <option value="left" <?php if($vol=="left") echo "selected"; ?>>left</option>
            <option value="right" <?php if($vol=="right") echo "selected"; ?>>right</option>
          </select>
        </div>
        <div class="box card-animated fade-in-delay-2">
          Speaker 
          <select id="sp" name="speaker" class="input-animated">
            <option value="top" <?php if($speaker=="top") echo "selected"; ?>>top</option>
            <option value="bottom" <?php if($speaker=="bottom") echo "selected"; ?>>bottom</option>
          </select>
              <br><br>
    <input type="submit" class="next-btn btn-animated" value="Next">
</form>
        </div>
      </div>
    </div>


  




<<script>
let ph = phone;
let pw = power;
let vl = volume;
let spk = speaker;
let priceBox = document.getElementById("price");

// function to update price
function updatePrice() {
  let size = parseFloat(s.value);
  let price = <?php echo (int)$row['screenbase'] ?> + ((size - 5) / 0.1) * <?php echo (int)$row['screenperinch'] ?>;
  priceBox.value = price.toFixed(0);
}

// screen size update
function updateScreen() {
  let size = s.value;
  sVal.textContent = size + '"';
  ph.style.width = (size * 22) + "px";
  ph.style.height = (size * 42) + "px";
  updatePrice();
}
s.oninput = updateScreen;

// corner update
function updateCorners() {
  let corner = c.value;
  cVal.textContent = corner + "px";
  ph.style.borderRadius = corner + "px";
}
c.oninput = updateCorners;

// thickness update
function updateThick() {
  let thick = t.value;
  tVal.textContent = thick + "mm";
  ph.style.borderWidth = (thick / 2) + "px";
}
t.oninput = updateThick;

// place power and volume buttons
function place() {
  pw.style.top = "15%";
  vl.style.top = "30%";
  if (p.value === "right") { pw.style.right = "-10px"; pw.style.left = "auto"; }
  else { pw.style.left = "-10px"; pw.style.right = "auto"; }
  if (v.value === "left") { vl.style.left = "-10px"; vl.style.right = "auto"; }
  else { vl.style.right = "-10px"; vl.style.left = "auto"; }
}
p.onchange = place;
v.onchange = place;

// place speaker
function spkPos() {
  spk.style.left = "50%";
  spk.style.transform = "translateX(-50%)";
  if (sp.value === "top") { spk.style.top = "-10px"; spk.style.bottom = "auto"; }
  else { spk.style.bottom = "-10px"; spk.style.top = "auto"; }
}
sp.onchange = spkPos;

// ✅ On page load: apply saved session values
window.onload = function() {
  updateScreen();
  updateCorners();
  updateThick();
  place();
  spkPos();
  updatePrice();
}
</script>

<script src="preloder.js"></script>
<script src="drag-animations.js"></script>
</body>
</html>
