<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Check password
        if (password_verify($password, $row['password'])) {
            // Store session variables
            $_SESSION['user_id']   = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['role']      = $row['role'];

            // Redirect based on role
            if ($row['role'] === 'admin') {
                header("Location: admin/index.php");
                exit;
            } elseif ($row['role'] === 'host') {
                // ✅ Only block vendors if status = 0
                if ($row['status'] == 0) {
                    $error = "Your account is blocked. Please contact admin.";
                } else {
                    header("Location: vendor_dashboard/index.php");
                    exit;
                }
            } else {
                $error = "Unknown role. Cannot redirect.";
            }

        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #e0e0e0;">
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 28rem; border-radius: 15px;">
      <h2 class="text-center mb-4">Login To Your Account</h2>

      <?php if (isset($error)) { ?>
        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
      <?php } ?>

      <form method="POST" action="">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>

        <div class="d-grid mb-2">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <div class="text-center">
          <small>Don't have an account? <a href="register.php">Register</a></small>
        </div>
      </form>
    </div>
  </div>
</body>
</html>


 // check role
            // is admin 
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['name'];
            header("Location: admin/index.php");

            // is host
            // redirect to host dashboard

