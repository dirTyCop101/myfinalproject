<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Check if advertisement ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the advertisement details from the database
    $query = "SELECT * FROM advertisements WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Handle form submission to update the advertisement
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $image = $_FILES['image'];

        // If a new image is uploaded
        if ($image['error'] == 0) {
            $imageName = time() . "_" . basename($image['name']);
            $imagePath = "uploads/" . $imageName;
            move_uploaded_file($image['tmp_name'], $imagePath);
        } else {
            $imagePath = $row['image']; // Keep old image if no new image is uploaded
        }

        // Update advertisement data in the database
        $updateQuery = "UPDATE advertisements SET title = '$title', description = '$description', image = '$imagePath' WHERE id = $id";
        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Advertisement updated successfully!'); window.location.href='dashboard.php?success=Advertisement updated successfully';</script>";
        } else {
            echo "<script>alert('Error updating advertisement.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Advertisement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Advertisement</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Advertisement Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $row['title'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Advertisement Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required><?= $row['description'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Advertisement Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <img src="uploads/<?= $row['image'] ?>" alt="Current Image" class="img-fluid mt-3">
            </div>

            <button type="submit" class="btn btn-primary">Update Advertisement</button>
        </form>
    </div>
</body>
</html>
