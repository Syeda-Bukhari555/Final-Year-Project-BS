<?php
session_start();
include("../config.php");

// Only logged-in hosts can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'host') {
    header("Location: ../login.php");
    exit;
}

$vendor_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Registered Places</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container-box {
      margin-top: 50px;
      background-color: #fff;
      padding: 30px;
      padding-left: -330px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .place-img {
      width: 100px;
      height: 60px;
      object-fit: cover;
      border-radius: 5px;
    }
    .table-responsive {
      overflow-x: auto;
    }
  </style>
</head>
<body>
<?php include('vendor-header.php'); ?>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar Column -->
    <div class="col-md-3 col-lg-2 bg-light min-vh-100 p-0">
      <?php include('vendor-sidebar.php'); ?>
    </div>

    <!-- Main Content Column -->
    <div class="col-md-9 col-lg-10">
      <div class="container mt-4 mb-4">
        <div class="container-box">
          <h2 class="text-center mb-4">My Listed Places</h2>

          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead class="table-dark text-center">
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Price (Rs.)</th>
                  <th>Description</th>
                  <th>Facilities</th>
                  <th>Features</th>
                  <th>Availability</th>
                  <th>Location</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Approval</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                $query = "SELECT * FROM place_table WHERE vendor_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $vendor_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . ucfirst($row['type']) . "</td>";
                    echo "<td>{$row['price']}</td>";
                    echo "<td>" . substr($row['description'], 0, 30) . "...</td>";
                    echo "<td>" . substr($row['facilities'], 0, 30) . "...</td>";
                    echo "<td>" . substr($row['features'], 0, 30) . "...</td>";

                    $availability = ucfirst($row['availability']);
                    $badgeClass = ($availability === "Available") ? "success" : "danger";
                    echo "<td><span class='badge bg-{$badgeClass}'>{$availability}</span></td>";

                    echo "<td>" . htmlspecialchars($row['location']) . "</td>";

                    echo "<td>";
                    if (!empty($row['main_image'])) {
                      echo "<img src='../" . htmlspecialchars($row['main_image']) . "' alt='image' class='place-img'>";
                    } else {
                      echo "No Image";
                    }
                    echo "</td>";

                    echo "<td><span class='badge bg-" . ($row['status'] === 'active' ? 'success' : 'secondary') . "'>" . ucfirst($row['status']) . "</span></td>";
                    echo "<td><span class='badge bg-" . ($row['approval'] === 'approved' ? 'primary' : 'warning') . "'>" . ucfirst($row['approval']) . "</span></td>";

                    echo "<td>
                            <a href='edit_place.php?id={$row['id']}' class='btn btn-sm btn-info mb-1'>Edit</a>
                            <a href='delete_place.php?id={$row['id']}' class='btn btn-sm btn-danger mb-1' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='13' class='text-center'>No places found</td></tr>";
                }
                $stmt->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include('vendor-footer.php'); ?>
</body>

</html>
