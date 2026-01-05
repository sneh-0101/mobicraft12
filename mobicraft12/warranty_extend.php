<?php
include 'cont.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $app = trim($_POST['application_number'] ?? '');
    if ($app !== '') {
        // Add 365 days to warranty_days
        $stmt = mysqli_prepare($con, "UPDATE orders SET warranty_days = COALESCE(warranty_days, 0) + 365 WHERE application_number = ?");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $app);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

header('Location: warranty.php');
exit;
