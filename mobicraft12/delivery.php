<?php
include 'cont.php';

$applicationNumber = '';
$order = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applicationNumber = trim($_POST['aplicationnumber'] ?? '');
    if ($applicationNumber === '') {
        $error = 'Please enter your application number.';
    } else {
        $stmt = mysqli_prepare($con, "SELECT aplicationnumber, progress, date FROM orderdetail WHERE aplicationnumber = ? LIMIT 1");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $applicationNumber);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result && mysqli_num_rows($result) > 0) {
                $order = mysqli_fetch_assoc($result);
            } else {
                $error = 'No order found for this application number.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $error = 'Database error. Please try again later.';
        }
    }
}

function progressStepFromValue(?string $progress): int {
    if (!$progress) return 1;
    $val = strtolower(trim($progress));
    if ($val === 'out of delivery' || $val === 'out-for-delivery' || $val === 'out') return 2;
    if ($val === 'delivered' || $val === 'delived' || $val === 'deliverr') return 3;
    return 1;
}

$step = progressStepFromValue($order['progress'] ?? null);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delivery Status - MobiCraft</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
<style>
body { margin: 0; font-family: sans-serif; background: #0a0f1c; color: #fff; }
main { max-width: 900px; margin: 20px auto; padding: 0 16px; }
.card { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 12px; padding: 16px; }
.input-row { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
.input-row input[type="text"] { padding: 10px 12px; border-radius: 8px; border: 1px solid #334; background:#111; color:#fff; min-width: 240px; }
.input-row button { padding: 10px 16px; border: 0; border-radius: 8px; background: linear-gradient(135deg,#0078ff,#00c6ff); color:#fff; cursor:pointer; }
.error { color: #ff6b6b; margin-top: 10px; }

.progress { margin: 24px 0; }
.progress-steps { display: flex; justify-content: space-between; align-items: center; position: relative; }
.progress-steps::before { content:""; position:absolute; top: 50%; left: 10%; right: 10%; height: 4px; background: rgba(255,255,255,0.15); transform: translateY(-50%); }
.step { position: relative; z-index: 1; text-align: center; width: 33.33%; }
.step .dot { width: 20px; height: 20px; border-radius: 50%; margin: 0 auto 8px; background: rgba(255,255,255,0.25); border: 2px solid rgba(255,255,255,0.35); }
.step.active .dot { background: #00c6ff; border-color: #7fdbff; box-shadow: 0 0 12px rgba(127,219,255,0.6); }
.step .label { font-size: 14px; color: #cfefff; }
.small { font-size: 12px; opacity: 0.8; }
</style>
</head>
<body>
  <div id="preloader">
    <div class="logo-container">
      <img src="logo.png" alt="MobiCraft Logo" class="logo-img">
    </div>
  </div>

  <header>
    <h1>MobiCraft</h1>
    <nav>
      <a href="home.php" class="active">Home</a>
      <a href="about.php">About</a>
      <a href="contect.php">Contact</a>
      <a href="pricelist.php">Pricelist</a>
    </nav>
  </header>

  <main>
    <h1>Delivery Status</h1>
    <div class="card">
      <form method="post">
        <div class="input-row">
          <label for="aplicationnumber">Application Number</label>
          <input type="text" id="aplicationnumber" name="aplicationnumber" value="<?php echo htmlspecialchars($applicationNumber); ?>" placeholder="Enter your application number" required>
          <button type="submit">Check</button>
        </div>
      </form>
      <?php if ($error): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>
    </div>

    <?php if ($order): ?>
      <div class="progress">
        <div class="progress-steps">
          <div class="step <?php echo $step>=1 ? 'active' : ''; ?>">
            <div class="dot"></div>
            <div class="label">Under Processing</div>
          </div>
          <div class="step <?php echo $step>=2 ? 'active' : ''; ?>">
            <div class="dot"></div>
            <div class="label">Out for Delivery</div>
          </div>
          <div class="step <?php echo $step>=3 ? 'active' : ''; ?>">
            <div class="dot"></div>
            <div class="label">Delivered</div>
          </div>
        </div>
        <div class="small">Application: <?php echo htmlspecialchars($order['aplicationnumber']); ?> | Date: <?php echo htmlspecialchars($order['date'] ?? ''); ?></div>
      </div>
    <?php endif; ?>
  </main>

  <script src="preloder.js"></script>
</body>
</html>
