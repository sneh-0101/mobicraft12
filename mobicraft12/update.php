<?php
include 'cont.php';

// Get current row (only 1 row in table)
$query = "SELECT * FROM partsprice LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// If form submitted → update row
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Safe collect (avoid undefined warnings)
    function safe($con, $name) {
        return mysqli_real_escape_string($con, $_POST[$name] ?? '');
    }

    $screenbase    = safe($con, 'screenbase');
    $screenperinch = safe($con, 'screenperinch');
    $flatdis       = safe($con, 'flatdis');
    $curveddis     = safe($con, 'curveddis');
    $amoladdis     = safe($con, 'amoladdis');
    $hz30          = safe($con, '30hz');
    $perhz         = safe($con, 'perhz');
    $res720        = safe($con, '720p');
    $res1080       = safe($con, '1080p');
    $res2k         = safe($con, '2k');
    $mediatekg95   = safe($con, 'mediatekg95');
    $snap870       = safe($con, 'snapdragan870');
    $snap888       = safe($con, 'snapdragan888');
    $exynos2200    = safe($con, 'exynos2200');
    $kirin9000     = safe($con, 'kirin9000');
    $snap8gen1     = safe($con, 'snapdragan8gen1');
    $dimensity8000 = safe($con, 'dimensity8000');
    $snap8gen2     = safe($con, 'snapdragan8gen2');
    $a15           = safe($con, 'a15');
    $a16           = safe($con, 'a16');
    $ram4          = safe($con, '4gb');
    $ram8          = safe($con, '8gb');
    $ram12         = safe($con, '12gb');
    $ram16         = safe($con, '16gb');
    $rom64         = safe($con, '64gb');
    $rom128        = safe($con, '128gb');
    $rom256        = safe($con, '256gb');
    $rom512        = safe($con, '512gb');
    $rom1tb        = safe($con, '1tb');
    $batt3000      = safe($con, '3000mah');
    $per500mah     = safe($con, 'per500mah');
    $watt5         = safe($con, '5w');
    $plus5w        = safe($con, '+per5w');
    $wireless      = safe($con, 'wireless');
    $camera1       = safe($con, 'camera1');
    $camera2       = safe($con, 'camera2');
    $camera3       = safe($con, 'camera3');
    $permg         = safe($con, 'permg');
    $function      = safe($con, 'function');
    $glass         = safe($con, 'glass');
    $plastic       = safe($con, 'plastic');
    $aluminum      = safe($con, 'aluminum');
    $lether        = safe($con, 'lether');
    $chossdesing   = safe($con, 'chossdesing');

    // Update query (backticks fix invalid column names)
    $sql = "UPDATE partsprice SET 
        screenbase='$screenbase',
        screenperinch='$screenperinch',
        flatdis='$flatdis',
        curveddis='$curveddis',
        amoladdis='$amoladdis',
        `30hz`='$hz30',
        perhz='$perhz',
        `720p`='$res720',
        `1080p`='$res1080',
        `2k`='$res2k',
        mediatekg95='$mediatekg95',
        snapdragan870='$snap870',
        snapdragan888='$snap888',
        exynos2200='$exynos2200',
        kirin9000='$kirin9000',
        snapdragan8gen1='$snap8gen1',
        dimensity8000='$dimensity8000',
        snapdragan8gen2='$snap8gen2',
        a15='$a15',
        a16='$a16',
        `4gb`='$ram4',
        `8gb`='$ram8',
        `12gb`='$ram12',
        `16gb`='$ram16',
        `64gb`='$rom64',
        `128gb`='$rom128',
        `256gb`='$rom256',
        `512gb`='$rom512',
        `1tb`='$rom1tb',
        `3000mah`='$batt3000',
        per500mah='$per500mah',
        `5w`='$watt5',
        `+per5w`='$plus5w',
        wireless='$wireless',
        camera1='$camera1',
        camera2='$camera2',
        camera3='$camera3',
        permg='$permg',
        `function`='$function',
        glass='$glass',
        plastic='$plastic',
        aluminum='$aluminum',
        lether='$lether',
        chossdesing='$chossdesing'
        LIMIT 1";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('✅ Updated successfully');
                window.location.href='admin.php';
        
        </script>";
    } else {
        echo "❌ Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Prices</title>
  <style>
    body{background:#0a0f1c;color:#fff;font-family:sans-serif;padding:20px;}
    form{max-width:900px;margin:auto;background:#111a2c;padding:20px;border-radius:10px;}
    label{display:block;margin-top:10px;color:#ff9f43;}
    input{width:100%;padding:6px;margin-top:4px;background:#1c2940;border:none;color:#fff;}
    button{margin-top:20px;padding:10px 20px;background:#1e90ff;color:#fff;border:none;border-radius:6px;}
  </style>
</head>
<body>
  <h1>📱 Update MobiCraft Price</h1>
  <form method="post">
    <label>Screen Base</label>
    <input type="text" name="screenbase" value="<?php echo $row['screenbase']; ?>">

    <label>+ per 0.1 inch</label>
    <input type="text" name="screenperinch" value="<?php echo $row['screenperinch']; ?>">

    <label>Flat Display</label>
    <input type="text" name="flatdis" value="<?php echo $row['flatdis']; ?>">

    <label>Curved Display</label>
    <input type="text" name="curveddis" value="<?php echo $row['curveddis']; ?>">

    <label>AMOLED</label>
    <input type="text" name="amoladdis" value="<?php echo $row['amoladdis']; ?>">

    <label>30Hz</label>
    <input type="text" name="30hz" value="<?php echo $row['30hz']; ?>">

    <label>+ per Hz</label>
    <input type="text" name="perhz" value="<?php echo $row['perhz']; ?>">

    <label>720p</label>
    <input type="text" name="720p" value="<?php echo $row['720p']; ?>">

    <label>1080p</label>
    <input type="text" name="1080p" value="<?php echo $row['1080p']; ?>">

    <label>2K</label>
    <input type="text" name="2k" value="<?php echo $row['2k']; ?>">

    <!-- 👉 Add the rest fields same way (mediatekg95, snap870, etc.) -->
<!-- Specification -->

  <h2>⚙️ Specification</h2>

  <h3>🖥 Processor</h3>
  <label>Mediatek G95</label>
  <input type="text" name="mediatekg95" value="<?php echo $row['mediatekg95']; ?>">

  <label>Snapdragon 870</label>
  <input type="text" name="snapdragan870" value="<?php echo $row['snapdragan870']; ?>">

  <label>Snapdragon 888</label>
  <input type="text" name="snapdragan888" value="<?php echo $row['snapdragan888']; ?>">

  <label>Exynos 2200</label>
  <input type="text" name="exynos2200" value="<?php echo $row['exynos2200']; ?>">

  <label>Kirin 9000</label>
  <input type="text" name="kirin9000" value="<?php echo $row['kirin9000']; ?>">

  <label>Snapdragon 8 Gen 1</label>
  <input type="text" name="snapdragan8gen1" value="<?php echo $row['snapdragan8gen1']; ?>">

  <label>Dimensity 8000</label>
  <input type="text" name="dimensity8000" value="<?php echo $row['dimensity8000']; ?>">

  <label>Snapdragon 8 Gen 2</label>
  <input type="text" name="snapdragan8gen2" value="<?php echo $row['snapdragan8gen2']; ?>">

  <label>Apple A15</label>
  <input type="text" name="a15" value="<?php echo $row['a15']; ?>">

  <label>Apple A16</label>
  <input type="text" name="a16" value="<?php echo $row['a16']; ?>">

  <h3>💾 RAM</h3>
  <label>4GB</label>
  <input type="text" name="4gb" value="<?php echo $row['4gb']; ?>">

  <label>8GB</label>
  <input type="text" name="8gb" value="<?php echo $row['8gb']; ?>">

  <label>12GB</label>
  <input type="text" name="12gb" value="<?php echo $row['12gb']; ?>">

  <label>16GB</label>
  <input type="text" name="16gb" value="<?php echo $row['16gb']; ?>">

  <h3>📂 ROM</h3>
  <label>64GB</label>
  <input type="text" name="64gb" value="<?php echo $row['64gb']; ?>">

  <label>128GB</label>
  <input type="text" name="128gb" value="<?php echo $row['128gb']; ?>">

  <label>256GB</label>
  <input type="text" name="256gb" value="<?php echo $row['256gb']; ?>">

  <label>512GB</label>
  <input type="text" name="512gb" value="<?php echo $row['512gb']; ?>">

  <label>1TB</label>
  <input type="text" name="1tb" value="<?php echo $row['1tb']; ?>">
  <!-- Camera -->
<div class="section">
  <h2>📸 Camera</h2>

  <label>1 Camera (Base)</label>
  <input type="text" name="camera1" value="<?php echo $row['camera1']; ?>">

  <label>2 Cameras</label>
  <input type="text" name="camera2" value="<?php echo $row['camera2']; ?>">

  <label>3 Cameras</label>
  <input type="text" name="camera3" value="<?php echo $row['camera3']; ?>">

  <h3>🔍 Megapixels</h3>
  <label>+ per MP</label>
  <input type="text" name="permg" value="<?php echo $row['permg']; ?>">
</div>

<!-- Functions -->
<div class="section">
  <h2>⚡ Functions</h2>
  <label>Each Function</label>
  <input type="text" name="function" value="<?php echo $row['function']; ?>">
</div>

<!-- Phone Back -->
<div class="section">
  <h2>📱 Phone Back</h2>

  <label>Glass</label>
  <input type="text" name="glass" value="<?php echo $row['glass']; ?>">

  <label>Plastic</label>
  <input type="text" name="plastic" value="<?php echo $row['plastic']; ?>">

  <label>Aluminium</label>
  <input type="text" name="aluminum" value="<?php echo $row['aluminum']; ?>">

  <label>Leather</label>
  <input type="text" name="lether" value="<?php echo $row['lether']; ?>">

  <h3>🎨 Design</h3>
  <label>Choose Design</label>
  <input type="text" name="chossdesing" value="<?php echo $row['chossdesing']; ?>">
  <!-- Battery -->
<div class="section">
  <h2>🔋 Battery</h2>

  <label>3000 mAh (Base)</label>
  <input type="text" name="3000mah" value="<?php echo $row['3000mah']; ?>">

  <label>+ per 500 mAh</label>
  <input type="text" name="per500mah" value="<?php echo $row['per500mah']; ?>">

  <h3>🔌 Wired Charging</h3>

  <label>5W (Base)</label>
  <input type="text" name="5w" value="<?php echo $row['5w']; ?>">

  <label>+ per 5W</label>
  <input type="text" name="+per5w" value="<?php echo $row['+per5w']; ?>">
</div>
  <label>wireless charging</label>
  <input type="text" name="5w" value="<?php echo $row['wireless'] ?>">

    
    <button type="submit">Save</button>
  </form>
</body>
</html>
