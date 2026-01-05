<?php
include 'cont.php'; // Your database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Contact Messages</title>
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="preloder.css">
<style>


h1 {
    text-align: center;
    color: #7fdbff;
    margin-bottom: 40px;
}

.card {
    background: rgba(255,255,255,0.05);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    max-width: 1200px;
    margin: 0 auto 40px auto;
    overflow-x: auto; /* scroll horizontally if needed */
}

table {
    width: 100%;
    border-collapse: collapse;
    color: #fff;
    min-width: 600px; /* ensures table is not too small */
}

th, td {
    padding: 12px 15px;
    border: 1px solid rgba(255,255,255,0.1);
    text-align: left;
}

th {
    background-color: rgba(127,219,255,0.2);
    color: #7fdbff;
}

tr:nth-child(even) {
    background-color: rgba(255,255,255,0.05);
}

tr:hover {
    background-color: rgba(127,219,255,0.1);
    cursor: default;
}

/* Responsive for smaller devices */
@media (max-width: 768px) {
    body {
        padding: 20px 10px;
    }

    h1 {
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    .card {
        padding: 20px;
    }

    th, td {
        padding: 10px 8px;
        font-size: 0.9rem;
    }
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

<h1>Contact Messages</h1>

<div class="card">
    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM form ORDER BY id DESC";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['subject']}</td>
                            <td>{$row['message']}</td>
                     
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>No messages found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="preloder.js"></script>

</body>
</html>
