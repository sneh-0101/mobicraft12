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
        // Use prepared statement to avoid SQL injection
        $stmt = mysqli_prepare($con, "SELECT * FROM orders WHERE aplicationnumber = ? LIMIT 1");
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
    // Map stored text to step number: 1 Processing, 2 Out for Delivery, 3 Delivered
    if (!$progress) return 1;
    $val = strtolower(trim($progress));
    if ($val === 'out of delivery' || $val === 'out-for-delivery' || $val === 'out') return 2;
    if ($val === 'delivered' || $val === 'delived' || $val === 'deliverr') return 3;
    return 1; // default processing
}

$step = progressStepFromValue($order['progress'] ?? null);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Track Order - MobiCraft</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
<style>
body { margin: 0; font-family: sans-serif; background: #0a0f1c; color: #fff; }
main { max-width: 1000px; margin: 20px auto; padding: 0 16px; }
.form-card { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 12px; padding: 16px; }
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

.details { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 12px; padding: 16px; margin-top: 18px; }
.details table { width: 100%; border-collapse: collapse; }
.details th, .details td { text-align: left; padding: 8px 10px; border-bottom: 1px solid rgba(255,255,255,0.08); font-size: 14px; }
.details th { width: 220px; color: #9fd8ff; }

.eta { margin-top: 10px; color: #9fd8ff; }
.small { font-size: 12px; opacity: 0.8; }

@media (max-width: 600px) {
  .step .label { font-size: 12px; }
}
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
  <button id="navbar-toggle">
    <span></span>
    <span></span>
    <span></span>
  </button>
  <nav id="navbar-menu">
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <a href="contect.php">Contact</a>
    <a href="pricelist.php" >Pricelist</a>
    
         <div class="dropdown">
        <button class="dropdown-btn" >Support ▼</button>
        <div class="dropdown-content">
          <a href="warranty.php" >Warranty Info</a>
          <a href="shipingpoilcy.php" >Shipping Policy</a>
          <a href="trackorder.php" class="active">TrackYouOrder</a>
          <a href="faq.php">FAQ</a>
        </div>
      </div>
      
  
    </nav>
  </header>

  <main>
    <h1>Track Your Order</h1>
    <div class="form-card">
      <form method="post">
        <div class="input-row">
          <label for="aplicationnumber">Application Number</label>
          <input type="text" id="aplicationnumber" name="aplicationnumber" value="<?php echo htmlspecialchars($applicationNumber); ?>" placeholder="Enter your application number" required>
          <button type="submit">Track</button>
        </div>
      </form>
      <?php if ($error): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>
    </div>

    <?php if ($order): ?>
      <div class="details">
        <h3>Customer</h3>
        <table>
          <tbody>
            <tr>
              <th>Full Name</th>
              <td><?php echo htmlspecialchars($order['fullname'] ?? ''); ?></td>
            </tr>
          </tbody>
        </table>
      </div>

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
        <div class="eta">Estimated delivery within 7 days from order date.</div>
        <div class="small">Application: <?php echo htmlspecialchars($order['aplicationnumber']); ?> | Date: <?php echo htmlspecialchars($order['date'] ?? ''); ?></div>
      </div>

      <div class="details">
        <h3>Order Details</h3>
        <table>
          <tbody>
            <?php foreach ($order as $key => $value): ?>
              <tr>
                <th><?php echo htmlspecialchars(ucfirst(str_replace('_', ' ', $key))); ?></th>
                <td><?php echo htmlspecialchars((string)$value); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </main>

  <script src="preloder.js"></script>
    <script src="navbar.js"></script>
</body>
</html>
