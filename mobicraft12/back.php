<?php
session_start();
$value6  = $_SESSION['value6']     ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['material'] = $_POST['material'];
    $_SESSION['color']    = $_POST['color'];
    $_SESSION['design']   = $_POST['design'];
    $_SESSION['price']    = $_POST['price'];
        $_SESSION['value7']  = $_POST['value7'];

    header("Location: final.php");
    exit;
}

// Restore if already set
$material = $_SESSION['material'] ?? "glass";
$color    = $_SESSION['color'] ?? "#1a1a1a";
$design   = $_SESSION['design'] ?? "none";
$price    = $_SESSION['price'] ?? "₹0";
$value7  = $_SESSION['value7']     ?? "";
include 'priceview.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MobiCraft - Final Customizer</title>
  <link rel="stylesheet" href="preloder.css">
  <link rel="stylesheet" href="theme.css">
  <link rel="stylesheet" href="navbar1.css">
  <link rel="stylesheet" href="button.css">
  <link rel="stylesheet" href="pricebox.css">
  <style>
    /* Layout */
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
    .phone-box, .controls-box {
      flex: 1;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    .phone-box {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 500px;
    }
    @media (max-width: 768px) {
      .container { flex-direction: column; margin-top: 200px; }
    }

    /* Phone */
    .phone {
      width: 250px;
      height: 500px;
      border-radius: 30px;
      border: 5px solid #333;
      position: relative;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }
    .phone-back {
      width: 100%;
      height: 100%;
      position: relative;
      transition: all 0.5s cubic-bezier(0.2, 0.9, 0.2, 1);
    }

    /* Materials */
    .material-glass { background-color: rgba(255, 255, 255, 0.15); backdrop-filter: blur(8px); }
    .material-plastic { box-shadow: inset 2px 2px 5px rgba(0,0,0,0.5), inset -2px -2px 5px rgba(255,255,255,0.1); }
    .material-aluminium { background: linear-gradient(135deg, #a0a0a0, #606060, #a0a0a0); }
    .material-leather { background: url('https://www.transparenttextures.com/patterns/leather.png'); background-size: 150px; }

    /* Designs */
    .design-glossy::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(120deg, rgba(255, 255, 255, 0.5), transparent 60%);
      pointer-events: none;
    }
    .design-matte { filter: brightness(0.8); }
    .design-pattern {
      background-image: repeating-linear-gradient(
        45deg, rgba(255, 255, 255, 0.08) 0px, rgba(255, 255, 255, 0.08) 2px, transparent 2px, transparent 6px
      );
    }

    /* Controls */
    .controls-box h2 { color: #00e5ff; margin-bottom: 15px; }
    .controls-box label, .controls-box select, .controls-box input[type="color"] {
      display: block;
      width: 100%;
      margin-bottom: 10px;
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #444;
      background-color: #222;
      color: #fff;
    }
/* uk logo */
.uk {
    margin-top: 350px;
    background: none;
}

  </style>
</head>
<body>
  <form method="post">
    <div class="inputbox">
    <label>Total Price</label>
    <input type="text" id="price" value="₹0" readonly name="value7">
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
      <a href="home.html" class="active">Home</a>
      <a href="aboutuspage.html">About</a>
      <a href="contect.html">Contact</a>
       <a href="pricelist.html">Pricelist</a>
     <a href="trackorder.php">Track order</a>
    </nav>
  </header>

  <!-- Floating Price Box -->


  <!-- Main -->
  <div class="uttam">
    <div class="container">
      <div class="controls-box">
        <h2>Customize Phone Back</h2>
     
    <div class="uttam">
      <div class="container">
        <div class="controls-box">
          <h2>Customize Phone Back</h2>

          <label for="material">Material:</label>
          <select id="material" name="material">
            <option value="glass" <?php if($material=="glass") echo "selected"; ?>>Glass</option>
            <option value="plastic" <?php if($material=="plastic") echo "selected"; ?>>Plastic</option>
            <option value="aluminium" <?php if($material=="aluminium") echo "selected"; ?>>Aluminium</option>
            <option value="leather" <?php if($material=="leather") echo "selected"; ?>>Leather</option>
          </select>

          <label for="color">Color:</label>
          <input type="color" id="color" name="color" value="<?php echo $color; ?>">

          <label for="design">Design:</label>
          <select id="design" name="design">
            <option value="none" <?php if($design=="none") echo "selected"; ?>>None</option>
            <option value="glossy" <?php if($design=="glossy") echo "selected"; ?>>Glossy</option>
            <option value="matte" <?php if($design=="matte") echo "selected"; ?>>Matte</option>
            <option value="pattern" <?php if($design=="pattern") echo "selected"; ?>>Pattern</option>
          </select>

          <br><br>
          <input type="submit"  class="next-btn" value="Next">
        
      </div>

      <div class="phone-box">
        <div class="phone">
         
          <div id="phone-back" class="phone-back"></div>
    
        </div>
    
    
  </div>
  <button class="previs" onclick="window.location.href='camara.php'">← previus</button>

  <script>
     let lastTotal = <?php echo (int)$value6; ?>; 
    const phoneBack = document.getElementById('phone-back');
    const materialSelect = document.getElementById('material');
    const colorInput = document.getElementById('color');
    const designSelect = document.getElementById('design');
    const priceBox = document.getElementById('price');

    const materialPrices = {
      glass: <?php echo (int)$row['glass'];?>,
      plastic: <?php echo (int)$row['plastic'];?>,
      aluminium: <?php echo (int)$row['aluminum'];?>,
      leather: <?php echo (int)$row['lether'];?>
    };

    const designPrices = {
      none: 0,
      glossy: <?php echo (int)$row['chossdesing'];?>,
      matte: <?php echo (int)$row['chossdesing'];?>,
      pattern: <?php echo (int)$row['chossdesing'];?>
    };

    function updatePhone() {
      const selectedMaterial = materialSelect.value;
      const selectedColor = colorInput.value;
      const selectedDesign = designSelect.value;

      // Reset styles
      phoneBack.className = 'phone-back';
      phoneBack.style.backgroundColor = '';
      phoneBack.style.backgroundImage = '';
      phoneBack.style.filter = '';
      phoneBack.style.boxShadow = '';

      // Apply material
      phoneBack.classList.add(`material-${selectedMaterial}`);
      if (selectedMaterial === 'glass') {
        phoneBack.style.backgroundColor = selectedColor;
      } else if (selectedMaterial === 'plastic') {
        const lighterColor = adjustColor(selectedColor, 50);
        phoneBack.style.background = `linear-gradient(135deg, ${lighterColor}, ${selectedColor})`;
      } else if (selectedMaterial === 'aluminium') {
        const lighterColor = adjustColor(selectedColor, 30);
        const darkerColor = adjustColor(selectedColor, -30);
        phoneBack.style.background = `linear-gradient(135deg, ${lighterColor}, ${selectedColor}, ${darkerColor})`;
      } else if (selectedMaterial === 'leather') {
        phoneBack.style.backgroundColor = selectedColor;
        phoneBack.style.backgroundImage = "url('https://www.transparenttextures.com/patterns/leather.png')";
      }

      // Apply design
      if (selectedDesign !== 'none') {
        phoneBack.classList.add(`design-${selectedDesign}`);
      }

      // Update Price
      const totalPrice = materialPrices[selectedMaterial] + designPrices[selectedDesign];



      
      
 let grandTotal = lastTotal + totalPrice;
   
    // update UI
    
  priceBox.value =  grandTotal;

    }

    function adjustColor(hex, lum) {
      hex = String(hex).replace(/[^0-9a-f]/gi, '');
      if (hex.length < 6) hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
      lum = lum || 0;
      let rgb = "#", c, i;
      for (i = 0; i < 3; i++) {
        c = parseInt(hex.substr(i*2,2), 16);
        c = Math.round(Math.min(Math.max(0, c + (c * lum / 100)), 255)).toString(16);
        rgb += ("00"+c).substr(c.length);
      }
      return rgb;
    }

    // Event listeners
    materialSelect.addEventListener('change', updatePhone);
    colorInput.addEventListener('input', updatePhone);
    designSelect.addEventListener('change', updatePhone);

    // Initial render
    updatePhone();
  </script>
  <script src="preloder.js"></script>
</body>
</html>
