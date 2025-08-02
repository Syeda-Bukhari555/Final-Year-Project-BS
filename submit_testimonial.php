<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Image upload handling
    $imagePath = 'images/default-user.jpg'; // default
    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . '_' . $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $uploadPath = 'uploads/testimonials/' . $imageName;

        if (move_uploaded_file($tmpName, $uploadPath)) {
            $imagePath = $uploadPath;
        }
    }

    // Insert into DB
    $insert = "INSERT INTO testimonial (description, name, address, image) 
               VALUES ('$description', '$name', '$address', '$imagePath')";

    if (mysqli_query($conn, $insert)) {
        echo "<script>alert('Review submitted successfully!'); window.location.href='frontend.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
