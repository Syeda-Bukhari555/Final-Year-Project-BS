<?php
session_start();
if ($_SESSION['user_role'] !== 'vendor') {
    die("Access Denied");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Vendor Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Welcome, <?php echo $_SESSION['user_name']; ?> (Vendor)</h2>
    <a href="add_place_form.php" class="btn btn-primary">Add New Place</a>

    <hr>
    <h3>Your Added Places</h3>

    <?php
    include 'db_connection.php';
    $vendor_id = $_SESSION['user_id'];

    $query = "SELECT * FROM place_table WHERE vendor_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $vendor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='card my-2 p-2'>";
        echo "<strong>Type:</strong> " . $row['type'] . "<br>";
        echo "<strong>Price:</strong> " . $row['price'] . "<br>";
        echo "<strong>Description:</strong> " . $row['description'] . "<br>";
        echo "<strong>Availability:</strong> " . $row['availability'] . "<br>";
        echo "<strong>Status:</strong> " . ($row['status'] ? "Active" : "Inactive") . "<br>";
        echo "<strong>Approved:</strong> " . ($row['approved'] ? "Yes" : "Pending") . "<br>";
        echo "</div>";
    }
    ?>
  </div>
</body>
</html>
