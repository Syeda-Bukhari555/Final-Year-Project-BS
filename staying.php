<?php
include 'config.php';

$selected_city = isset($_GET['city']) ? $_GET['city'] : '';

// Query for staying places
$sql = "SELECT * FROM place_table WHERE type = 'stay'";
if (!empty($selected_city)) {
    $sql .= " AND location LIKE '%$selected_city%'";
}
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Snowy Park Stay</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="staying.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid p-0">
    <a class="navbar-brand d-flex align-items-center" href="Home.html">
      <img class="nav-logo" src="logo55.png">
      <span class="web-name">SNOWY PARK STAY</span>
    </a>
    <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ps-5">
        <li class="nav-item"><a class="nav-link active" href="frontend.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="parking.php">Parking</a></li>
        <li class="nav-item"><a class="nav-link" href="staying.php">Staying</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<div class="container-fluid p-0">
  <div class="bg-parking d-flex flex-column justify-content-center align-items-center text-center">
    <div class="overlay"></div>
    <h1 class="text-park">Choose The Place To Stay</h1>

    <!-- Filter -->
    <section class="find-section">
      <form method="GET" action="staying.php">
        <div class="find-bar d-flex flex-wrap justify-content-center align-items-center">
          <select class="dropdown" name="city" required>
            <option value="">Search Location</option>
            <option value="Murree" <?php if($selected_city == "Murree") echo "selected"; ?>>Murree</option>
            <option value="Skardu" <?php if($selected_city == "Skardu") echo "selected"; ?>>Skardu</option>
            <option value="Swat" <?php if($selected_city == "Swat") echo "selected"; ?>>Swat</option>
          </select>
          <button type="submit" class="find-button">Find Staying</button>
        </div>
      </form>
    </section>
  </div>
</div>

<!-- Available Hotels -->
<div class="available-slots">
  <h2 class="content text-center" style="color: rgb(10, 74, 53, 0.916);">Available Hotels</h2>
  <div class="card-container py-5">
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class="card">
        <img src="<?php echo $row['main_image']; ?>" alt="Stay Image">
        <div class="card-content">
          <h3><?php echo $row['title']; ?></h3>
          <p class="price">Rs.<?php echo $row['price']; ?>/night</p>
          <p><?php echo $row['location']; ?></p>
          <a href="place-detail.php?id=<?php echo $row['id']; ?>" class="btn btn-success mt-2">View Details</a>
        </div>
      </div>
    <?php
        }
    } else {
        echo "<p class='text-center'>No staying places found for the selected location.</p>";
    }
    ?>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="footer container-fluid">
    <div class="row text-center text-md-start g-4">
      <div class="col-12 col-md-4 mb-4">
        <img src="logo55.png" class="footer-img" alt="">
        <h3 class="footer-name">SNOWY PARK STAY</h3>
        <h4 class="footer-explanation">
          We provide safe stays, secure parking, scenic locations, easy booking, and trusted service!
        </h4>
      </div>
      <div class="col-12 col-md-4 mb-4">
        <div class="link-footer">
          <h2 class="nav-footer">Navigation</h2>
          <ul class="navbar-nav-footer p-0">
            <li class="nav-item-footer"><a class="nav-link" href="Frontend.html">Home</a></li>
            <li class="nav-item-footer"><a class="nav-link" href="About Us.html">About Us</a></li>
            <li class="nav-item-footer"><a class="nav-link" href="Parking.html">Parking</a></li>
            <li class="nav-item-footer"><a class="nav-link" href="Staying.html">Staying</a></li>
            <li class="nav-item-footer"><a class="nav-link" href="Admin.html">Admin</a></li>
          </ul>
        </div>
      </div>
      <div class="col-12 col-md-4 mb-4">
        <div class="contact">
          <h2 class="info">Contact Info</h2>
          <ul class="items">
            <li class="location1"><i class="fa-solid fa-location-dot"></i> 1234 Mall Road Murree</li>
            <li class="services"><i class="fa-solid fa-phone"></i> +92 211 111 255 512</li>
            <li class="available"><i class="fa-solid fa-clock"></i> Service Available 24/7</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Copyright -->
<div class="container-fluid p-0">
  <div class="reserved d-flex flex-column flex-md-row align-items-center justify-content-center gap-2">
    <i class="fa-regular fa-copyright"></i>
    <h2 class="text-white m-0">2025 All rights reserved.</h2>
  </div>
</div>
</body>
</html>
