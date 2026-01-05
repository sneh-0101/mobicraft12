<?php
include 'cont.php';

// Sales Statistics Queries
$today = date('Y-m-d');
$thisMonth = date('Y-m');

// Daily sales count
$dailyQuery = "SELECT COUNT(*) as daily_count FROM orderdetail WHERE DATE(date) = '$today'";
$dailyResult = mysqli_query($con, $dailyQuery);
$dailyCount = mysqli_fetch_assoc($dailyResult)['daily_count'];

// Monthly sales count
$monthlyQuery = "SELECT COUNT(*) as monthly_count FROM orderdetail WHERE DATE_FORMAT(date, '%Y-%m') = '$thisMonth'";
$monthlyResult = mysqli_query($con, $monthlyQuery);
$monthlyCount = mysqli_fetch_assoc($monthlyResult)['monthly_count'];

// Total sales count
$totalQuery = "SELECT COUNT(*) as total_count FROM orderdetail";
$totalResult = mysqli_query($con, $totalQuery);
$totalCount = mysqli_fetch_assoc($totalResult)['total_count'];

// Today's revenue (if price column exists)
$dailyRevenueQuery = "SELECT SUM(CAST(price AS DECIMAL(10,2))) as daily_revenue FROM orderdetail WHERE DATE(date) = '$today' AND price != '' AND price IS NOT NULL";
$dailyRevenueResult = mysqli_query($con, $dailyRevenueQuery);
$dailyRevenue = mysqli_fetch_assoc($dailyRevenueResult)['daily_revenue'] ?? 0;

// Monthly revenue
$monthlyRevenueQuery = "SELECT SUM(CAST(price AS DECIMAL(10,2))) as monthly_revenue FROM orderdetail WHERE DATE_FORMAT(date, '%Y-%m') = '$thisMonth' AND price != '' AND price IS NOT NULL";
$monthlyRevenueResult = mysqli_query($con, $monthlyRevenueQuery);
$monthlyRevenue = mysqli_fetch_assoc($monthlyRevenueResult)['monthly_revenue'] ?? 0;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    margin: 0;
    font-family: sans-serif;
    background: #0a0f1c;
    color: #fff;
    padding: 20px;
}
        sales-stats {
    display: flex;
  
    gap: 20px;
    margin: 30px 0;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

.stat-box {
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(0, 198, 255, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(255,255,255,0.1), transparent);
    pointer-events: none;
}

.stat-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(0, 198, 255, 0.4);
}

.stat-box h3 {
    margin: 0 0 15px 0;
    font-size: 1.1rem;
    color: #f0f0f0;
    font-weight: 600;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #fff;
    margin: 10px 0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.stat-label {
    font-size: 0.9rem;
    color: #e0e0e0;
    margin: 5px 0;
}

.stat-box.revenue {
    background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
    box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
}

.stat-box.revenue:hover {
    box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
}

.stat-box.total {
    background: linear-gradient(135deg, #4ecdc4, #44a08d);
    box-shadow: 0 8px 25px rgba(78, 205, 196, 0.3);
}

.stat-box.total:hover {
    box-shadow: 0 12px 35px rgba(78, 205, 196, 0.4);
}

/* Main Content */
.main-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
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
  <h1>MobiCraft admin panal</h1>
  <nav>
  <a href="admin.php">back</a>
  </nav>
</header>
    <!-- Main Content -->
  <div class="main-content">
    <h1>📊 Sales Dashboard</h1>
    
    <!-- Sales Statistics Boxes -->
    <div class="sales-stats">
      <div class="stat-box">
        <h3>📅 Today's Orders</h3>
        <div class="stat-number"><?php echo $dailyCount; ?></div>
        <div class="stat-label">Orders placed today</div>
      </div>
      
      <div class="stat-box">
        <h3>📆 This Month</h3>
        <div class="stat-number"><?php echo $monthlyCount; ?></div>
        <div class="stat-label">Orders this month</div>
      </div>
      
      <div class="stat-box total">
        <h3>📈 Total Orders</h3>
        <div class="stat-number"><?php echo $totalCount; ?></div>
        <div class="stat-label">All time orders</div>
      </div>
      
      <div class="stat-box revenue">
        <h3>💰 Today's Revenue</h3>
        <div class="stat-number"><?php echo number_format($dailyRevenue, 2); ?></div>
        <div class="stat-label">Revenue today</div>
      </div>
      
      <div class="stat-box revenue">
        <h3>💵 Monthly Revenue</h3>
        <div class="stat-number"><?php echo number_format($monthlyRevenue, 2); ?></div>
        <div class="stat-label">Revenue this month</div>
      </div>
    </div>
    <script src="preloder.js"></script>
</body>
</html>