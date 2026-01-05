<?php
session_start();
$totalprice   = $_SESSION['totalprice']  ?? "";


// Save data if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['type']     = $_POST['type'];
    $_SESSION['refresh']  = $_POST['refresh'];
    $_SESSION['bright']   = $_POST['bright'];
    $_SESSION['res']      = $_POST['res'];
    $_SESSION['value2']  = $_POST['value2'];
    header("Location: speci.php"); // next page
    exit;
}

// Restore values if already saved in sessionv
$type    = $_SESSION['type']    ?? "flat";
$refresh = $_SESSION['refresh'] ?? 60;
$bright  = $_SESSION['bright']  ?? 1000;
$res     = $_SESSION['res']     ?? "1080";
$value2  = $_SESSION['value2']     ?? "";
include 'priceview.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MobiCraft</title>

  <!-- External CSS -->
  <link rel="stylesheet" href="preloder.css">
  <link rel="stylesheet" href="theme.css">
  <link rel="stylesheet" href="navbar1.css">
  <link rel="stylesheet" href="button.css">
  <link rel="stylesheet" href="pricebox.css">
  <link rel="stylesheet" href="animations.css">
  <style>
    /* Box Layout */
    .box {
      display: flex;
      gap: 20px;
      max-width: 1000px;
      width: 100%;
      flex-wrap: wrap;
      justify-content: center;
      margin: 20px auto;
      
    }

    /* Phone */
    .phone {
      width: 220px;
      height: 440px;
      background: #000;
      border-radius: 25px;
      overflow: hidden;
      transition: 0.3s;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
      box-shadow: 0 5px 20px gray;
    }
    .phone img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: 0.3s;
    }

    /* Display Styles */
    .flat { transform: none; }
    .curved { transform: perspective(800px) rotateY(-25deg); }
    .amoled { transform: perspective(800px) rotateX(5deg) scale(1.05); }
    .amoled img { filter: saturate(1.2) contrast(1.1); }
    .curved img { transform: translateX(-3%); }

    /* Controls */
    .controls {
      flex: 1;
      background: #222;
      padding: 15px;
      border-radius: 10px;
      min-width: 250px;
      box-shadow: 0 5px 20px gray;
    }
    label {
      display: block;
      margin-top: 10px;
      font-size: 14px;
    }
    select, input, button {
      width: 100%;
      margin-top: 5px;
      padding: 6px;
      border-radius: 6px;
      border: none;
      background: #333;
      color: #fff;
    }
    button {
      background: orange;
      color: #000;
      font-weight: bold;
      cursor: pointer;
    }
    .info {
      margin-top: 10px;
      font-size: 14px;
      color: #9fe;
    }

    /* Fixed Price Box */
  

    /* Responsive */
    @media (max-width: 768px) {
      .box { flex-direction: column; align-items: center; }
      .phone { width: 180px; height: 360px; }
      .controls { width: 90%; }
    }
    @media (max-width: 480px) {
      .phone { width: 150px; height: 300px; }
      .controls { padding: 10px; }
      label, .info { font-size: 12px; }
    }
  
  </style>
</head>
<body>
   <form method="post" action="">
  <!-- Price Box -->
  <div class="inputbox">
    <label>Total Price:</label>
    <input type="text" id="price" value="" readonly name="value2">
  </div>

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
      <a href="#home" class="active">Home</a>
      <a href="aboutuspage.html">About</a>
      <a href="contect.html">Contact</a>
       <a href="pricelist.html">Pricelist</a>
     <a href="trackorder.php">Track order</a>
    </nav>
  </header>

  <!-- Main Box -->
  <div class="box">
    <!-- Phone -->
    <div id="phone" class="phone flat">
      <img id="screen" src="https://picsum.photos/540/1080" alt="Phone Screen">
    </div>

    <!-- Controls -->
    <div class="controls">
     
  <label>Display Type</label>
  <select name="type" id="type">
    <option value="flat"   <?php if($type=="flat") echo "selected"; ?>>Flat</option>
    <option value="curved" <?php if($type=="curved") echo "selected"; ?>>Curved</option>
    <option value="amoled" <?php if($type=="amoled") echo "selected"; ?>>AMOLED</option>
  </select>

  <label>Refresh Rate <span id="rLabel"><?php echo $refresh; ?></span> Hz</label>
  <input type="range" name="refresh" id="refresh" min="30" max="144" value="<?php echo $refresh; ?>">

  <label>Brightness <span id="bLabel"><?php echo $bright; ?></span> nits</label>
  <input type="range" name="bright" id="bright" min="500" max="3000" step="50" value="<?php echo $bright; ?>">

  <label>Resolution</label>
  <select name="res" id="res">
    <option value="720"  <?php if($res=="720") echo "selected"; ?>>720p</option>
    <option value="1080" <?php if($res=="1080") echo "selected"; ?>>1080p</option>
    <option value="2k"   <?php if($res=="2k") echo "selected"; ?>>2K</option>
  </select>

  <button id="reset" type="button">Reset</button>
  <div id="info" class="info"></div>
  <button type="submit" class="next-btn">Next</button>
</form>
    </div>
  </div>
 
    <button class="previs" onclick="window.location.href='phonedesign.php'">← previus</button>
   

  <script>
    let lastTotal = <?php echo (int)$totalprice; ?>;  
  // elements
  const phone=document.getElementById("phone");
  const img=document.getElementById("screen");
  const info=document.getElementById("info");
  const type=document.getElementById("type");
  const refresh=document.getElementById("refresh");
  const bright=document.getElementById("bright");
  const res=document.getElementById("res");
  const rLabel=document.getElementById("rLabel");
  const bLabel=document.getElementById("bLabel");
  const reset=document.getElementById("reset");
  const price=document.getElementById("price");

  // update phone
  function update(){
    // type (flat/curved/amoled)
    phone.className="phone "+type.value;

    // brightness and blur
    img.style.filter=`brightness(${bright.value/1000}) blur(${(120-refresh.value)/40}px)`;

    // resolution
    let w=540,h=1080;
    if(res.value==="720"){w=360;h=720}
    if(res.value==="2k"){w=1080;h=2160}
    img.src=`https://picsum.photos/${w}/${h}?t=${Date.now()}`;

    // labels and info
    rLabel.textContent=refresh.value;
    bLabel.textContent=bright.value;
    info.textContent=`Type: ${type.value} • ${refresh.value} Hz • ${bright.value} nits • ${res.value}`;

    // ---- PRICE CALCULATION ----
       let total = 0; 
    // display price
    if(type.value==="flat") total+=<?php echo (int)$row['flatdis'] ?>;
    if(type.value==="curved") total+=<?php echo (int)$row['curveddis'] ?>;
    if(type.value==="amoled") total+=<?php echo (int)$row['amoladdis'] ?>;

    // refresh rate price
    let hz=parseInt(refresh.value);
    total+=<?php echo (int)$row['30hz'] ?> + (hz-30)*<?php echo (int)$row['perhz'] ?>;

    // resolution price
    if(res.value==="720") total+=<?php echo (int)$row['720p'] ?>;
    if(res.value==="1080") total+=<?php echo (int)$row['1080p'] ?>;
    if(res.value==="2k") total+=<?php echo (int)$row['2k'] ?>;

    // brightness price (base 500 = 500, +50 per 100 nits)
    let b=parseInt(bright.value);
    total+=500 + Math.floor((b-500)/100)*50;
     let grandTotal = lastTotal + total;
   
    // update UI
     price.value=grandTotal;
  }

  // events
  type.onchange=refresh.oninput=bright.oninput=res.onchange=update;
  reset.onclick=()=>{
    type.value="flat";refresh.value=60;bright.value=1000;res.value="1080";update();
  }
  update();
</script>

  <script src="preloder.js"></script>
</body>
</html>
