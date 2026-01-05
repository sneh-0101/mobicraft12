<?php
include 'cont.php'; // your DB connection file

// Run query (get only 1 row since table has 1 row with 45 columns)
$query = "SELECT * FROM partsprice";
$result = mysqli_query($con, $query);

// Check if query failed
if(!$result){
    die("❌ Query Failed: " . mysqli_error($con));
}

// Fetch row if available
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
} else {
    die("❌ No data found in table 'partprice'");
}
?>