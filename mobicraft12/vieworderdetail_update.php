<?php
include 'cont.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $app = trim($_POST['aplicationnumber'] ?? '');
    $progress = trim($_POST['progress'] ?? '');

    if ($app !== '' && $progress !== '') {
        $stmt = mysqli_prepare($con, "UPDATE orderdetail SET progress = ? WHERE aplicationnumber = ?");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ss', $progress, $app);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

header('Location: vieworderdetail.php');
exit;
