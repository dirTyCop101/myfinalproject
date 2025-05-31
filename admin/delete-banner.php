<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Check if the banner ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the banner details to get the image path
    $query = "SELECT image FROM home_content WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $imagePath = $row['image'];

    // Delete the banner from the database
    $deleteQuery = "DELETE FROM home_content WHERE id = $id";
    
    if (mysqli_query($conn, $deleteQuery)) {
        // Delete the image file from the server if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        header('Location: dashboard.php?success=Banner deleted successfully.');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header('Location: dashboard.php?error=Invalid banner ID.');
    exit();
}
?>
