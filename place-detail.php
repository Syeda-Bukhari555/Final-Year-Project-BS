<?php
include("config.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $place_id = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT * FROM place_table WHERE id = ?");
    $stmt->bind_param("i", $place_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $place = $result->fetch_assoc();
    } else {
        echo "Place not found!";
        exit;
    }

    $stmt->close();
} else {
    echo "Invalid Request!";
    exit;
}
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
  <style>
    .main-image{
      width: 100%;
      height: auto;
      border-radius: 10px;
    }
    .thumbnail-img{
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
    }
    .room-info{
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 10px;
    }
    .back-btn{
      margin-top: 20px;
    }
  </style>
</head>
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
<div class="container mt-5">
  <!-- Room Title -->
  <div class="row mb-4">
    <div class="col text-center">
      <h2>Premium Mountain View Room</h2>
    </div>
  </div>

  <!-- Main Room Image and Description -->
  <div class="row g-4">
  <div class="col-md-6">
    <img src="<?php echo $place['main_image']; ?>" alt="Main Room Image" class="main-image">
  </div>
  <div class="col-md-6">
    <div class="room-info">
      <h4><?php echo $place['title']; ?></h4>
      <p><?php echo $place['description']; ?></p>

      <h5 class="mt-3">Availability</h5>
      <p>Status: 
        <span class="<?php echo ($place['availability'] === 'Available') ? 'text-success' : 'text-danger'; ?> fw-bold">
          <?php echo $place['availability']; ?>
        </span>
      </p>

      <h6>Features:</h6>
      <ul class="mb-3">
<?php
$features_str = $place['features']; 
$features = explode(',', $features_str);

foreach ($features as $feature) {
    echo '<li>' . trim($feature) . '</li>';
}
?>
</ul>

    </div>
    <a href="booking.php?place_id=<?php echo $place['id']; ?>" class="btn btn-primary">Book Now</a>
  </div>
</div>

  <!-- Related Images -->
  <div class="row mt-5">
    <div class="col-12">
      <h4>More Images</h4>
    </div>
    <div class="col-md-4 mt-3">
      <img src="<?php echo $place['gallery1']; ?>" alt="Related Image 1" class="img-fluid thumbnail-img w-100">
    </div>
    <div class="col-md-4 mt-3">
      <img src="<?php echo $place['gallery2']; ?>" alt="Related Image 2" class="img-fluid thumbnail-img w-100">
    </div>
    <div class="col-md-4 mt-3">
      <img src="<?php echo $place['gallery3']; ?>" alt="Related Image 3" class="img-fluid thumbnail-img w-100">
    </div>
   

  </div>

  <!-- Back Button -->
  <div class="row back-btn">
    <div class="col text-center">
      <a href="stay-page.html" class="btn btn-secondary">← Back to Rooms</a>
    </div>
  </div>
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
