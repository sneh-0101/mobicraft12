<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<style>
    h1 {
    margin: 20px auto 40px auto;
    color: #7fdbff;
}

.dashboard {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    width: 100%;
    max-width: 1200px;
   margin: 50px;
    
}

.card {
    background: rgba(255,255,255,0.05);
    border-radius: 20px;
    padding: 50px 20px;
    text-align: center;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 10px 40px rgba(0,0,0,0.3);
}

.card:hover {
    background: rgba(255,255,255,0.12);
    transform: translateY(-8px);
}

.card i {
    font-size: 3rem;
    color: #7fdbff;
    margin-bottom: 20px;
}

.card h2 {
    margin: 10px 0;
    font-size: 1.8rem;
    color: #7fdbff;
}

.card p {
    margin-top: 5px;
    font-size: 1.1rem;
    color: #fff;
}
</style>
<body>
    <div id="preloader">
  <div class="logo-container">
    <img src="logo.png" alt="MobiCraft Logo" class="logo-img">
  </div>
</div>

<!-- Header -->
<header>
  <h1>MobiCraft admin panal</h1>
  <nav>
  <a href="home.php">Home</a>
  </nav>
</header>
<h1>Admin Dashboard</h1>

<div class="dashboard">
    <div class="card" onclick="location.href='update.php'">
        <i class="fas fa-dollar-sign"></i>
        <h2>Change Part Price</h2>
        <p>Update the price of parts</p>
    </div>
    
    <div class="card" onclick="location.href='inquiry.php'">
        <i class="fas fa-question-circle"></i>
        <h2>Inquiry</h2>
        <p>View user inquiries</p>
    </div>

    <div class="card" onclick="location.href='orderview.php'">
        <i class="fas fa-file-alt"></i>
        <h2>Application Number</h2>
        <p>Generate or view application numbers</p>
    </div>

    <div class="card" onclick="location.href='vieworderdetail.php'">
        <i class="fas fa-box-open"></i>
        <h2>Order</h2>
        <p>Manage orders</p>
    </div>

    <div class="card" onclick="location.href='dashboard.php'">
        <i class="fas fa-chart-bar"></i>
        <h2>Sales Dashboard</h2>
        <p>View sales statistics and analytics</p>
    </div>
</div>

    <script src="preloder.js"></script>
</body>
</html>