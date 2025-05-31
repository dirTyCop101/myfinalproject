<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Check if banner ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the banner details from the database
    $query = "SELECT * FROM home_content WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // If form is submitted, update banner details
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        // If a new image is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = $_FILES['image'];
            $imagePath = 'uploads/' . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $imagePath);
        } else {
            $imagePath = $row['image']; // Keep the old image if no new one is uploaded
        }

        // Update the banner details in the database
        $updateQuery = "UPDATE home_content SET title = '$title', description = '$description', image = '$imagePath' WHERE id = $id";
        
        if (mysqli_query($conn, $updateQuery)) {
            header('Location: dashboard.php?success=Banner updated successfully.');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Banner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Banner</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($row['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required><?= htmlspecialchars($row['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Banner Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="uploads/<?= $row['image'] ?>" class="img-fluid mt-2" alt="Current Image">
            </div>
            <button type="submit" class="btn btn-primary">Update Banner</button>
        </form>
    </div>
</body>
</html>
