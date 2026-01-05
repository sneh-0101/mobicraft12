<?php
include 'cont.php';

$applicationNumber = '';
$order = null;
$error = '';
$daysLeft = null;
$status = '';
$purchaseDate = null;
$endDate = null;

// Configure warranty duration in days
$WARRANTY_DAYS = 365; // fallback if DB value missing

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applicationNumber = trim($_POST['application_number'] ?? '');
    if ($applicationNumber === '') {
        $error = 'Please enter your application number.';
    } else {
        $stmt = mysqli_prepare($con, "SELECT * FROM orders WHERE application_number = ? LIMIT 1");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $applicationNumber);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result && mysqli_num_rows($result) > 0) {
                $order = mysqli_fetch_assoc($result);
                // Expect 'order_date' column to store order date; prefer DB column warranty_days if present
                $purchaseDate = $order['order_date'] ?? null;
                $dbWarrantyDays = isset($order['warranty_days']) ? (int)$order['warranty_days'] : $WARRANTY_DAYS;
                if ($purchaseDate) {
                    $purchaseTs = strtotime($purchaseDate);
                    if ($purchaseTs !== false) {
                        $endTs = strtotime("+{$dbWarrantyDays} days", $purchaseTs);
                        $todayTs = strtotime(date('Y-m-d'));
                        $daysLeft = (int)ceil(($endTs - $todayTs) / 86400);
                        $endDate = date('Y-m-d', $endTs);
                        if ($daysLeft < 0) {
                            $status = 'Expired';
                        } elseif ($daysLeft === 0) {
                            $status = 'Expires today';
                        } else {
                            $status = 'Active';
                        }
                    } else {
                        $error = 'Invalid order date format.';
                    }
                } else {
                    $error = 'Order date not available.';
                }
            } else {
                $error = 'No order found for this application number.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $error = 'Database error. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Warranty Checker - MobiCraft</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
<style>
body { margin: 0; font-family: sans-serif; background: #0a0f1c; color: #fff; }
main { max-width: 1000px; margin: 20px auto; padding: 0 16px; }
.card { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 12px; padding: 16px; }
.input-row { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
.input-row input[type="text"] { padding: 10px 12px; border-radius: 8px; border: 1px solid #334; background:#111; color:#fff; min-width: 240px; }
.input-row button { padding: 10px 16px; border: 0; border-radius: 8px; background: linear-gradient(135deg,#0078ff,#00c6ff); color:#fff; cursor:pointer; }
.error { color: #ff6b6b; margin-top: 10px; }

.table { width: 100%; border-collapse: collapse; margin-top: 16px; }
.table th, .table td { text-align: left; padding: 8px 10px; border-bottom: 1px solid rgba(255,255,255,0.08); font-size: 14px; }
.table th { width: 220px; color: #9fd8ff; }
.badge { display:inline-block; padding:4px 10px; border-radius:999px; font-size:12px; }
.badge.active { background: rgba(0,198,255,0.2); color:#7fdbff; }
.badge.expired { background: rgba(255,107,107,0.2); color:#ff6b6b; }
.badge.today { background: rgba(255,174,0,0.2); color:#ffae00; }
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
          <a href="warranty.php" class="active">Warranty Info</a>
          <a href="shipingpoilcy.php">Shipping Policy</a>
          <a href="trackorder.php">TrackYouOrder</a>
          <a href="faq.php">FAQ</a>
        </div>
      </div>
      
  
    </nav>
  </header>

  <main>
    <h1>Warranty Checker</h1>
    <div class="card">
      <form method="post">
        <div class="input-row">
          <label for="application_number">Application Number</label>
          <input type="text" id="application_number" name="application_number" value="<?php echo htmlspecialchars($applicationNumber); ?>" placeholder="Enter your application number" required>
          <button type="submit">Check Warranty</button>
        </div>
      </form>
      <?php if ($error): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>
    </div>

    <?php if ($order && !$error): ?>
      <div class="card">
        <h3>Warranty Status</h3>
        <table class="table">
          <tr>
            <th>Full Name</th>
            <td><?php echo htmlspecialchars($order['full_name'] ?? ''); ?></td>
          </tr>
          <tr>
            <th>Application Number</th>
            <td><?php echo htmlspecialchars($order['application_number'] ?? ''); ?></td>
          </tr>
          <tr>
            <th>Purchase Date</th>
            <td><?php echo htmlspecialchars($purchaseDate ?? ''); ?></td>
          </tr>
          <tr>
            <th>Warranty End Date</th>
            <td><?php echo htmlspecialchars($endDate ?? ''); ?></td>
          </tr>
          <tr>
            <th>Warranty Duration</th>
            <td><?php echo htmlspecialchars((string)($order['warranty_days'] ?? $WARRANTY_DAYS)); ?> day(s)</td>
          </tr>
          <tr>
            <th>Days Left</th>
            <td>
              <?php if ($daysLeft !== null): ?>
                <?php echo $daysLeft >= 0 ? $daysLeft : 0; ?> day(s)
              <?php else: ?>
                N/A
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th>Status</th>
            <td>
              <?php if ($daysLeft !== null): ?>
                <?php if ($daysLeft < 0): ?>
                  <span class="badge expired">Expired</span>
                <?php elseif ($daysLeft === 0): ?>
                  <span class="badge today">Expires Today</span>
                <?php else: ?>
                  <span class="badge active">Active</span>
                <?php endif; ?>
              <?php else: ?>
                <span class="badge">Unknown</span>
              <?php endif; ?>
            </td>
          </tr>
        </table>
      </div>

      <div class="card">
        <h3>Extend Warranty</h3>
        <p>Extend your warranty by 365 days for ₹1500.</p>
        <form method="post" action="warranty_extend.php">
          <input type="hidden" name="application_number" value="<?php echo htmlspecialchars($order['application_number'] ?? ''); ?>">
          <button type="submit">Extend Warranty (₹1500)</button>
        </form>
      </div>
    <?php endif; ?>
  </main>

  <script src="preloder.js"></script>
  <script src="navbar.js"></script>
</body>
</html>
