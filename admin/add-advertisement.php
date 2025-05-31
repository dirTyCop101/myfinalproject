<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = $_FILES['image'];

    // Check if image is uploaded
    if ($image['error'] == 0) {
        $imageName = time() . "_" . basename($image['name']);
        $imagePath = "uploads/" . $imageName;

        // Move uploaded image to the 'uploads' directory
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Insert advertisement data into the database
            $query = "INSERT INTO advertisements (title, description, image) VALUES ('$title', '$description', '$imageName')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Advertisement added successfully!'); window.location.href='dashboard.php?success=Advertisement added successfully';</script>";
            } else {
                echo "<script>alert('Error adding advertisement.');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    } else {
        echo "<script>alert('Please upload an image.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Advertisement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Add New Advertisement</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Advertisement Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Advertisement Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Advertisement Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Advertisement</button>
        </form>
    </div>
</body>
</html>
