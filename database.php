<?php 
include("config.php");
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
<section class="container py-5">
  <h2 class="text-center mb-5">Available Rooms in Skardu</h2>
  <div class="row g-4">
  
    <!-- Room Option 1 -->
     
     <?php
     $query = "SELECT * FROM `place_table` WHERE approved = 1 && status = 1";

     $run = $conn->query($query);
     if ($run->num_rows > 0) {
              while ($row = $run->fetch_assoc()) {
?>
<div class="col-md-4">
      <div class="card shadow-sm h-100">
        <img src="slider-r3.jpg" class="card-img-top" alt="Room Image">
        <div class="card-body">
          <h5 class="card-title"> <?php echo $row['title']; ?> gggg</h5>
          <p><strong>Owner:</strong> Ali Khan</p>
          <p><strong>Price:</strong> Rs. 2,500 / night</p>
          <p><strong>Facilities:</strong> WiFi, Hot Water, Breakfast</p>
          <p><strong>Location:</strong> Near Kachura Lake, Skardu</p>
          
          <a href="tel:+923001112222" class="btn btn-primary w-100 btn-sm">📞 Contact Owner</a>
        </div>
      </div>
    </div>
<?php
      }
     }

     ?>
    

    <!-- Room Option 2 -->
    <!-- <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <img src="slider-r3.jpg" class="card-img-top" alt="Room Image">
        <div class="card-body">
          <h5 class="card-title">Mountain View Private Room</h5>
          <p><strong>Owner:</strong> Fatima Bibi</p>
          <p><strong>Price:</strong> Rs. 3,000 / night</p>
          <p><strong>Facilities:</strong> WiFi, Parking, Balcony View</p>
          <p><strong>Location:</strong> Near Shigar Fort, Skardu</p>
          <a href="https://goo.gl/maps/example2" target="_blank" class="btn btn-outline-secondary btn-sm mb-2">📍 View on Map</a>
          <a href="tel:+923004445555" class="btn btn-primary w-100 btn-sm">📞 Contact Owner</a>
        </div>
      </div>
    </div> -->

    <!-- Room Option 3 -->
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <img src="slider-r5.jpg" class="card-img-top" alt="Room Image">
        <div class="card-body">
          <h5 class="card-title">Family Room in Peaceful Area</h5>
          <p><strong>Owner:</strong> Jameel Ahmed</p>
          <p><strong>Price:</strong> Rs. 2,000 / night</p>
          <p><strong>Facilities:</strong> Kitchen Access, WiFi, Parking</p>
          <p><strong>Location:</strong> Hussainabad, Skardu</p>
          <a href="https://goo.gl/maps/example3" target="_blank" class="btn btn-outline-secondary btn-sm mb-2">📍 View on Map</a>
          <a href="tel:+923007778888" class="btn btn-primary w-100 btn-sm">📞 Contact Owner</a>
        </div>
      </div>
    </div>

  </div>
</section>

    
  
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