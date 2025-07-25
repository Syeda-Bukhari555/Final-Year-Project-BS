<?php
$host = "localhost";
$username = "root";
$password = "";     
$database = "snowy_park_stay";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name      = $_POST['name'];
    $phone     = $_POST['phone'];
    $email     = $_POST['email'];
    $checkin   = $_POST['checkin'];
    $checkout  = $_POST['checkout'];
    $guests    = $_POST['guests'];
    $requests  = $_POST['requests'] ?? '';

    $sql = "INSERT INTO bookings (name, phone, email, checkin, checkout, guests, requests)
            VALUES ('$name', '$phone', '$email', '$checkin', '$checkout', '$guests', '$requests')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='color:green; text-align:center;'>Booking successfully submitted!</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snowy Park Stay</title>
    <!-- font cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- CSS link -->
    <link rel="stylesheet" href="database.css">
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icon Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />     
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  
</head>
          
 <style>
    body {
      background: #f0f4f8;
      font-family: 'Segoe UI', sans-serif;
    }
    .booking-container {
      max-width: 700px;
      margin: 60px auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .form-title {
      font-size: 26px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
    .btn-custom {
      background-color: #28a745;
      color: white;
      font-weight: 500;
    }
    .btn-custom:hover {
      background-color: #218838;
    }
  </style>
<body>
        <!-- start Navigation -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
      <div class="container-fluid p-0 ">
          <!-- Logo -->
          <a class="navbar-brand d-flex align-items-center" href="Home.html">
               <img class="nav-logo" src="logo55.png"  >
                <span class="web-name">SNOWY PARK STAY</span>
          </a>
              <!-- Toggler bar -->

              <button class="navbar-toggler text-dark"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
         
           <!-- Navagation -->
         
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ps-5">
                  <li class="nav-item">
                      <a class="nav-link active" href="frontend.php">Home</a>
                  </li>
                   <li class="nav-item">
                      <a class="nav-link" href="about-us.php">About Us</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="parking.php">Parking</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="staying.php">Staying</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="login.php">Admin</a>
                  </li> 
                  <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li> 
                   <!-- <li class="nav-item">
                    <div class="Call">
                  <i class="fa-solid fa-phone"></i>
                  <h5>+92 211 111 255 512</h5>
              </div> 
                      
                  </li> -->

              </ul>
                             
          </div>
      </div>
  </nav>
           <!-- End Navigation -->
  <div class="container booking-container">
    <div class="form-title">Book Your Stay or Parking</div>

    <form method="POST" action="submit_booking.php">
    <input type="hidden" name="place_id" value="<?php echo $_GET['place_id']; ?>">

      <div class="mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="checkin" class="form-label">Check-in Date</label>
          <input type="date" class="form-control" id="checkin" name="checkin" required>
        </div>

        <div class="col-md-6 mb-3">
          <label for="checkout" class="form-label">Check-out Date</label>
          <input type="date" class="form-control" id="checkout" name="checkout" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="guests" class="form-label">Number of Guests / Vehicles</label>
        <input type="number" class="form-control" id="guests" name="guests" required>
      </div>

      <div class="mb-3">
        <label for="requests" class="form-label">Additional Requests (Optional)</label>
        <textarea class="form-control" id="requests" name="requests"></textarea>
      </div>

      <div class="d-grid">
  <button type="submit" class="btn btn-custom">
    <i class="fa fa-calendar-check"></i> Book Now
  </button>
</div>

    </form>
  </div>
<section5> 
   <footer>
  <div class="footer container-fluid">
    <div class="row text-center text-md-start g-4"> 
      <!-- Logo and Description -->
      <div class="col-12 col-md-4 mb-4">
        <img src="logo55.png" class="footer-img" alt="">
        <h3 class="footer-name">SNOWY PARK STAY</h3>
        <h4 class="footer-explanation">
          We are the official providers who provide safe stays, secure parking, scenic locations, easy booking, and trusted service!
        </h4>
      </div> 

      <!-- Navigation -->
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

      <!-- Contact Info -->
     <div class="col-12 col-md-4 mb-4">
        <div class="contact">
          <h2 class="info">Contact Info</h2>
          <ul class="items">
            <li class="location1">Corporate Office Address:
              <div class="to-hover"><i class="fa-solid fa-location-dot"></i>1234 Mall Road Murree</div>
            </li>
            <li class="services">Customer Service:
              <div class="to-hover"><i class="fa-solid fa-phone"></i>+92 211 111 255 512</div>
            </li>
            <li class="available">Services Availability:
              <div class="to-hover"><i class="fa-solid fa-clock"></i>Service Available 24/7</div>
            </li>
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
