<?php
include 'cont.php';

// Use orders table with correct column names
$query = "SELECT * FROM orders ORDER BY application_number DESC";
$result = mysqli_query($con, $query);

// Debug if query failed
if(!$result){
    die("SQL Error: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Applications - MobiCraft</title>
<link rel="stylesheet" href="preloder.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="navbar1.css">
<link rel="stylesheet" href="button.css">

<style>
body {
    margin: 0;
    font-family: sans-serif;
    background: #0a0f1c;
    color: #fff;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #7fdbff;
    margin-bottom: 30px;
}

.table-container {
    max-width: 1000px;
    margin: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 12px 15px;
    border: 1px solid rgba(255,255,255,0.1);
    text-align: left;
}

th {
    background: rgba(127,219,255,0.2);
    color: #7fdbff;
}

tr:nth-child(even) {
    background: rgba(255,255,255,0.05);
}

.details {
    display: none;
    padding: 15px;
    margin: 10px 0;
    border-radius: 12px;
    background: rgba(255,255,255,0.07);
}

.details table {
    margin-top: 10px;
}

tr:hover { cursor: pointer; background: rgba(127,219,255,0.15); }
.show { display: block; }
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
<h1>All Application Numbers</h1>
<div class="table-container">
<table>
    <thead>
        <tr>
            <th>Application Number</th>
            <th>Full Name</th>
            <th>Mobile</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr class="app-row" data-id="<?php echo $row['application_number']; ?>">
            <td><?php echo $row['application_number']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
        </tr>
        <tr id="details-<?php echo $row['application_number']; ?>" class="details">
            <td colspan="3">
                <table>
                <?php foreach($row as $key=>$value): ?>
                    <tr>
                        <th style="width:250px;"><?php echo ucfirst($key); ?></th>
                        <td><?php echo $value; ?></td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>


<script>
// Toggle details on row click
document.querySelectorAll(".app-row").forEach(row=>{
    row.addEventListener("click",()=>{
        const id = row.dataset.id;
        const detailsRow = document.getElementById("details-"+id);
        detailsRow.classList.toggle("show");
    });
});
</script>
<script src="preloder.js"></script>
<script src="navbar.js"></script>
</body>
</html>
