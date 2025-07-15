<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role  = $_POST['role']; // 'admin' or 'host'

    // Set status based on role
    $status = ($role === "admin") ? 0 : 1;

    $conn = mysqli_connect("localhost", "root", "", "snowy_park_stay");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $emailResult = mysqli_query($conn, $checkEmail);
    if (mysqli_num_rows($emailResult) > 0) {
        echo "<p style='color:red;'>❌ This email is already registered. Please login.</p>";
        exit;
    }

    // If admin is selected, check if any admin exists already
    if ($role === "admin") {
        $checkAdmin = "SELECT * FROM users WHERE role='admin'";
        $adminResult = mysqli_query($conn, $checkAdmin);
        if (mysqli_num_rows($adminResult) > 0) {
            echo "<p style='color:red;'>❌ Admin is already registered. You can only register as Host.</p>";
            exit;
        }
    }

    // Insert the user
    $query = "INSERT INTO users (name, email, phone, password, role, status) 
              VALUES ('$name', '$email', '$phone', '$pass', '$role', '$status')";

    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success text-center'>✅ Registered successfully as <b>$role</b>. <a href='login.php'>Login Now</a></div>";
    } else {
        echo "<div class='alert alert-danger text-center'>❌ Error: " . mysqli_error($conn) . "</div>";
    }

    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Snowy Park Stay - Register</title>

  <!-- Fonts + CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Register.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
  <style>
    body {
      background-color: rgb(192, 188, 188);
      font-family: 'Poppins', sans-serif;
    }
     .form-wrapper {
        padding-top: 50px;
        padding-bottom: 50px;
        overflow: hidden;     /* This prevents scrolling */
}
    .card {
      border-radius: 15px;
    }

    /* Adjust card width on different screen sizes */
    @media (max-width: 992px) {
      .card {
        width: 100%;
        margin: 0 20px;
      }
    }
  </style>
</head>
<body>
<div class="container form-wrapper d-flex justify-content-center align-items-center min-vh-100">


    <div class="card p-4 shadow w-100" style="max-width: 40rem;">
      <h1 class="text-center mb-4">Registration Form</h1>

      <form method="POST" action="">
        <!-- Name -->
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
        </div>

        <!-- Phone -->
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" name="phone" placeholder="03XXXXXXXXX" required>
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Create a password" required>
        </div>

        <!-- Role Selection -->
        <div class="mb-4">
          <label class="form-label">Select Role</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="admin" value="admin" required>
            <label class="form-check-label" for="admin">Admin</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="host" value="host" required>
            <label class="form-check-label" for="host">Host</label>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
















//  check 
// is admin
// status = 0
// is host
// status =1