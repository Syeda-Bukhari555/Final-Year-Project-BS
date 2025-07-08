<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Snowy Park Stay</title>
   <!-- font cdn -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
   <!-- CSS link -->
   <link rel="stylesheet" href="Staying.css">
   <!-- Bootstrap link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Icon Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
   integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
  </head>
<body>
        <!-- Navbar -->
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
                      <a class="nav-link active" href="Frontend.html">Home</a>
                  </li>
                   <li class="nav-item">
                      <a class="nav-link" href="About Us.html">About Us</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="Parking.html">Parking</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="Staying.html">Staying</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="Admin.html">Admin</a>
                  </li> 
                   <li class="nav-item">
                    <div class="Call">
                  <i class="fa-solid fa-phone"></i>
                  <h5>+92 211 111 255 512</h5>
              </div> 
                      
                  </li>

              </ul>
                             
          </div>
      </div>
  </nav>
    <!-- Navbar Done -->
     <!-- Section 1 -->
    <div class="container-fluid p-0">
  <div class="bg-parking d-flex flex-column justify-content-center align-items-center text-center">
    <div class="overlay"></div>
    
    <h1 class="text-park">Choose The Place To Stay</h1>

    <!-- Selection Bar -->
    <section class="find-section">
      <div class="find-bar d-flex flex-wrap justify-content-center align-items-center">
        <select class="dropdown">
          <option value="">Search Location</option>
          <option value="Murree">Murree</option>
          <option value="Skardu">Skardu</option>
          <option value="Swat">Swat</option>
        </select>
        <button class="find-button">Find Staying</button>
      </div>
    </section>
  </div>
</div>

     <!-- section sir -->
      <div class="available-slots">
      <h2 class="content" style="justify-content: center; text-align: center; color: rgb(10, 74, 53, 0.916);">Available Hotels</h2>
  
      <div class="card-container py-5">
        <div class="card">
          <img src="car 1 (1).jpg" alt="Parking 1">
          <div class="card-content">
            <h3>Mall Road Parking</h3>
            <p class="price">Rs.150/hr</p>
            <p>Located in the heart of Murree.</p>
          </div>
        </div>
    
        <div class="card">
          <img src="car 1 (10).jpg" alt="Parking 2">
          <div class="card-content">
            <h3>Green Park Garage Mall Road</h3>
            <p class="price">Rs.300/hr</p>
            <p>Safe and secure parking with CCTV surveillance.</p>
          </div>
        </div>
    
        <div class="card">
          <img src="car 1 (8).jpg" alt="Parking 3">
          <div class="card-content">
            <h3>Kashmir Point Mall Road</h3>
            <p class="price">Rs.500/hr</p>
            <p>Scenic view and walkable access to nearby cafes.</p>
          </div>
        </div>
        <div class="card">
          <img src="car 1 (11).jpg" alt="Parking 3">
          <div class="card-content">
            <h3>Pindi Point Lot</h3>
            <p class="price">Rs.900/hr</p>
            <p>Parking area near the chairlift and viewpoint.</p>
          </div>
        </div>
        <div class="card">
          <img src="car 1 (12).jpg" alt="Parking 3">
          <div class="card-content">
            <h3>Lakeview Lot Mall Road</h3>
            <p class="price">Rs.500/hr</p>
            <p>Scenic parking near the lake, great for weekend trips.</p>
          </div>
        </div>
        <div class="card">
          <img src="car 1 (1).jpg" alt="Parking 3">
          <div class="card-content">
            <h3>Lakeview Lot Mall Road</h3>
            <p class="price">Rs.500/hr</p>
            <p>Scenic parking near the lake, great for weekend trips.</p>
          </div>
        </div>
        <div class="card">
          <img src="car 1 (13).jpg" alt="Parking 3">
          <div class="card-content">
            <h3>Lakeview Lot Mall Road</h3>
            <p class="price">Rs.500/hr</p>
            <p>Scenic parking near the lake, great for weekend trips.</p>
          </div>
        </div>
        <div class="card">
          <img src="car 1 (8).jpg" alt="Parking 3">
          <div class="card-content">
            <h3>Lakeview Lot Mall Road</h3>
            <p class="price">Rs.500/hr</p>
            <p>Scenic parking near the lake, great for weekend trips.</p>
          </div>
        </div>
      </div>
    </div> 
    <!-- Section 3 -->
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

