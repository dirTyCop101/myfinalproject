<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Check if advertisement ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch advertisement details to get the image path
    $query = "SELECT image FROM advertisements WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $imagePath = $row['image'];

    // Delete advertisement from database
    $deleteQuery = "DELETE FROM advertisements WHERE id = $id";
    if (mysqli_query($conn, $deleteQuery)) {
        // Delete the image file if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        header('Location: dashboard.php?success=Advertisement deleted successfully.');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
