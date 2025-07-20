<?php
session_start();
include("../config.php");

// Allow only logged-in vendors
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'host') {
    header("Location: ../login.php");
    exit;
}

$vendor_id   = $_SESSION['user_id'];
$vendor_name = $_SESSION['user_name'];
$success = "";
$error = "";

// Fetch active cities
$city_sql = "SELECT id, name FROM city_table WHERE status='active'";
$city_result = mysqli_query($conn, $city_sql);
if (!$city_result) {
    $error = "Error fetching cities: " . mysqli_error($conn);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type        = mysqli_real_escape_string($conn, $_POST['type']);
    $title       = mysqli_real_escape_string($conn, $_POST['title']);
    $price       = floatval($_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $facilities  = mysqli_real_escape_string($conn, $_POST['facilities']);
    $location    = mysqli_real_escape_string($conn, $_POST['location']);
    $city_id     = intval($_POST['city_id']);
    $created_by  = $vendor_name;

    // Upload images
    $upload_dir = "../uploads/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    function uploadImage($fileKey, $upload_dir) {
        $allowed_types = ['jpg', 'jpeg', 'png', 'webp'];
        if (!empty($_FILES[$fileKey]['name'])) {
            $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
            if (in_array($ext, $allowed_types)) {
                $new_name  = uniqid() . "." . $ext;
                $full_path = $upload_dir . $new_name;
                if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $full_path)) {
                    return "uploads/" . $new_name;
                }
            }
        }
        return "";
    }

    $main_image = uploadImage('main_image', $upload_dir);
    $gallery1   = uploadImage('gallery1', $upload_dir);
    $gallery2   = uploadImage('gallery2', $upload_dir);
    $gallery3   = uploadImage('gallery3', $upload_dir);

    // Insert into DB
    $query = "INSERT INTO place_table 
        (vendor_id, type, title, price, description, facilities, location, city_id, created_by, main_image, gallery1, gallery2, gallery3)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issdsssssssss", $vendor_id, $type, $title, $price, $description, $facilities, $location, $city_id, $created_by,
                      $main_image, $gallery1, $gallery2, $gallery3);

    if ($stmt->execute()) {
        $success = "✅ Place and images added successfully!";
    } else {
        $error = "❌ Error adding place: " . $stmt->error;
    }
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Place</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background-color: #f5f5f5; }
    .form-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
      margin-top: 40px;
      margin-left: 340px;
    }
  </style>
</head>
<body>

<?php include("vendor-header.php"); ?>
<div class="container-fluid">
  <div class="row">
    <?php include("vendor-sidebar.php"); ?>

    <div class="col-md-9 p-4">
      <div class="form-box">
        <h2 class="mb-4">➕ Add New Place</h2>

        <?php if ($success) echo "<div class='alert alert-success'>$success</div>"; ?>
        <?php if ($error)   echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form method="POST" action="" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Type of Place</label>
            <select class="form-select" name="type" required>
              <option value="">-- Select Type --</option>
              <option value="stay">Stay</option>
              <option value="park">Park</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Price (Rs.)</label>
            <input type="number" class="form-control" name="price" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Select City</label>
            <select name="city_id" class="form-select" required>
              <option value="">-- Select City --</option>
              <?php
              if ($city_result && mysqli_num_rows($city_result) > 0) {
                  while ($row = mysqli_fetch_assoc($city_result)) {
                      echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                  }
              } else {
                  echo '<option value="">No active cities found</option>';
              }
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Availability</label>
            <select name="availability" class="form-select" required>
            <option value="">-- Select Availability --</option>
            <option value="available">Available</option>
            <option value="not available">Not Available</option>
           </select>
          </div>

          <div class="mb-3">
  <label class="form-label">Features</label>
  <input type="text" name="features[]" class="form-control mb-2" placeholder="Feature 1" required>
  <input type="text" name="features[]" class="form-control mb-2" placeholder="Feature 2">
  <input type="text" name="features[]" class="form-control mb-2" placeholder="Feature 3">
  <input type="text" name="features[]" class="form-control mb-2" placeholder="Feature 4">
  <input type="text" name="features[]" class="form-control mb-2" placeholder="Feature 5">
</div>
  


          <div class="mb-3">
            <label class="form-label">Facilities</label>
            <textarea class="form-control" name="facilities" rows="2"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" name="location" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Main Image</label>
            <input type="file" name="main_image" class="form-control" accept="image/*" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Gallery Image 1</label>
            <input type="file" name="gallery1" class="form-control" accept="image/*">
          </div>

          <div class="mb-3">
            <label class="form-label">Gallery Image 2</label>
            <input type="file" name="gallery2" class="form-control" accept="image/*">
          </div>

          <div class="mb-3">
            <label class="form-label">Gallery Image 3</label>
            <input type="file" name="gallery3" class="form-control" accept="image/*">
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Add Place</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>




