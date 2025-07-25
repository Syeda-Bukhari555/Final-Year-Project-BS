<?php
include("config.php"); // database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name      = trim($_POST['name'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $checkin   = trim($_POST['checkin'] ?? '');
    $checkout  = trim($_POST['checkout'] ?? '');
    $guests    = trim($_POST['guests'] ?? '');
    $requests  = trim($_POST['requests'] ?? '');
    $place_id  = $_POST['place_id'] ?? '';

    // Validate required fields
    if ($name && $phone && $email && $checkin && $checkout && $guests && $place_id) {
        $sql = "INSERT INTO bookings (name, phone, email, checkin, checkout, guests, requests, place_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssi", $name, $phone, $email, $checkin, $checkout, $guests, $requests, $place_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<h2 style='color:green; text-align:center;'>✅ Booking successful!</h2>";
        } else {
            echo "<h3 style='color:red; text-align:center;'>❌ Error: " . mysqli_error($conn) . "</h3>";
        }
    } else {
        echo "<h3 style='color:orange; text-align:center;'>⚠️ All required fields must be filled!</h3>";
    }
} else {
    echo "<h3 style='color:red; text-align:center;'>Invalid request method.</h3>";
}
?>


