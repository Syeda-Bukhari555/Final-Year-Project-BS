<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snowy Park Stay</title>
    <!-- font cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- CSS link -->
    <link rel="stylesheet" href="frontendaa.css">
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
          <div class="container-fluid">
          <!-- Logo -->
          <a class="navbar-brand d-flex align-items-center" href="Home.html">
           <img class="nav-logo" src="logo55.png">
           <span class="web-name">SNOWY PARK STAY</span>
          </a>
          <!-- Toggler bar -->
          <button class="navbar-toggler text-dark"  type="button" data-bs-toggle="collapse"
           data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
           aria-label="Toggle navigation">
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
                <a class="nav-link" href="login.php">Login</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li> 
            <!-- <li class="nav-item">
              <div class="Call">
                <i class="fa-solid fa-phone"></i>
                <h5>+92 211 111 255 512</h5>
              </div>      
            </li>-->
          </ul>                  
          </div>
        </div>
  </nav>
           <!-- End Navigation -->
       <!-- Section 1 -->
  <section class="home-page position-relative">
  <div class="hero-section d-flex flex-column justify-content-center align-items-center text-center">
    <h3 class="text-overlay">We Have Lots Of Options For <br> Staying And Parking</h3>

    <!-- Selection Bar -->
  <?php include 'config.php'; ?>

<form action="database.php" method="GET" class="search-bar mt-4">
  <select class="dropdown text-center" name="option" required>
    <option value="">Select Option</option>
    <option value="Stay">Stay</option>
    <option value="Park">Park</option>
  </select>

  <select class="dropdown text-center" name="city" required>
    <option value="">Select City</option>
    <?php
    $query = "SELECT id, name FROM city_table WHERE status = 1";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . htmlspecialchars($row['name']) . '">' . htmlspecialchars($row['name']) . '</option>';
        }
    } else {
        echo '<option disabled>No active cities found</option>';
    }
    ?>
  </select>

  <button class="search-button" type="submit">Search</button>
</form>




</section>
    <!-- Section 1 Ended  -->


     <section2>
      <div class="stress">
  <div class="container">
    <div class="row justify-content-center">
      <!-- Card 1 -->
      <div class="col-12 col-sm-10 col-md-6 col-lg-4 mb-4">
        <div class="card d-flex flex-row align-items-center h-100">
          <i class="fa-solid fa-wallet"></i>
          <div class="card-body ms-3">
            <h4 class="card-title">Save Money</h4>
            <p class="card-text">Discover reasonable parking and staying options that allow you to cut costs without sacrificing comfort or quality.</p>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-12 col-sm-10 col-md-6 col-lg-4 mb-4">
        <div class="card d-flex flex-row align-items-center h-100">
          <i class="fa-solid fa-thumbs-up"></i>
          <div class="card-body ms-3">
            <h4 class="card-title">Save Money</h4>
            <p class="card-text">Discover reasonable parking and staying options that allow you to cut costs without sacrificing comfort or quality.</p>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="col-12 col-sm-10 col-md-6 col-lg-4 mb-4">
        <div class="card d-flex flex-row align-items-center h-100">
          <i class="fa-solid fa-clock-rotate-left"></i>
          <div class="card-body ms-3">
            <h4 class="card-title">Save Money</h4>
            <p class="card-text">Discover reasonable parking and staying options that allow you to cut costs without sacrificing comfort or quality.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    
    </section> 
     <section3>
        <section class="choose-option">
  <div class="container">
    <h2 class="choose">
  Why Choose <span class="underline">Snowy</span><br>Park Stay
</h2>
    <h4 class="explain">We are the official providers who provide safe stays <br>
      secure parking scenic locations easy booking <br>
      and trusted service!
    </h4>

    <!-- Responsive Video -->
    <div class="video-container">
      <video class="video" controls>
        <source src="Pro-Video.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>

    <!-- Stay and Park Boxes -->
    <div class="row justify-content-center mt-5">
      <div class="col-12 col-md-6 d-flex justify-content-center">
        <div class="window d-flex align-items-center">
          <i class="fa-solid fa-hotel"></i>
          <div class="window-body ms-4">
            <h4 class="window-title">Stay</h4>
            <p class="window-text">For a pleasant and memorable stay, Snowy Park Stay provides clean and comfortable rooms, a peaceful environment, hot water, heating, room service, and lovely views.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 d-flex justify-content-center mt-4 mt-md-0">
        <div class="window d-flex align-items-center">
          <i class="fa-solid fa-square-parking"></i>
          <div class="window-body ms-4">
            <h4 class="window-title">Park</h4>
            <p class="window-text">Snowy Park Stay provides safe, spacious parking with 24/7 monitoring, reasonable prices, and different spaces for both short-term and long-term car rentals.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
      
    </section>
  <section class="testimonial-section">
  <div class="container">
    <h2 class="Reviews">What Our <br> Custo<span class="line">me</span>rs Say</h2>

    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <?php
        include 'config.php';
        $query = "SELECT * FROM testimonial ORDER BY id DESC";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="swiper-slide">
          <div class="testimonial-card d-flex flex-column justify-content-between text-center p-3 h-100">
            <div class="star-row">
              <i class="fa-regular fa-star"></i>
              <i class="fa-regular fa-star"></i>
              <i class="fa-regular fa-star"></i>
            </div>
            <p class="description"><?= htmlspecialchars($row['description']) ?></p>
            <h5 class="p-name"><?= htmlspecialchars($row['name']) ?></h5>
            <p class="p-location"><?= htmlspecialchars($row['address']) ?></p>
            <img src="<?= htmlspecialchars($row['image']) ?>" class="user-image" alt="<?= htmlspecialchars($row['name']) ?>">
          </div>
        </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>No testimonials found.</p>";
        }
        ?>

      </div>

      <!-- Swiper Navigation Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
</section>
<section class="submit-review py-5 bg-light">
  <div class="container">
    <h3 class="mb-4 text-center">Leave a Review</h3>
    <form action="submit_testimonial.php" method="POST" enctype="multipart/form-data" class="row g-3">

      <div class="col-md-6">
        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
      </div>

      <div class="col-md-6">
        <input type="text" name="address" class="form-control" placeholder="Your City or Address" required>
      </div>

      <div class="col-12">
        <textarea name="description" class="form-control" rows="4" placeholder="Write your review..." required></textarea>
      </div>

      <div class="col-12">
        <label class="form-label">Upload Image (Optional)</label>
        <input type="file" name="image" class="form-control">
      </div>

      <div class="col-12 text-center">
        <button type="submit" name="submit" class="btn btn-primary">Submit Review</button>
      </div>

    </form>
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
            <li class="nav-item-footer"><a class="nav-link" href="frontend.php">Home</a></li>
            <li class="nav-item-footer"><a class="nav-link" href="about-us.php">About Us</a></li>
            <li class="nav-item-footer"><a class="nav-link" href="parking.php">Parking</a></li>
            <li class="nav-item-footer"><a class="nav-link" href="staying.php">Staying</a></li>
            <li class="nav-item-footer"><a class="nav-link" href="admin.php">Admin</a></li>
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
 <script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,  // ✅ This adds gap between cards
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 40
      }
    }
  });
</script>


</body>
</html>