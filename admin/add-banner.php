<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Check if form is submitted
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
            // Insert banner data into the database
            $query = "INSERT INTO home_content (title, description, image) VALUES ('$title', '$description', '$imageName')";
            if (mysqli_query($conn, $query)) {
                // Redirect to dashboard with success message
                header('Location: dashboard.php?success=Banner added successfully!');
                exit(); // Ensure no further code is executed
            } else {
                echo "<script>alert('Error adding banner.');</script>";
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
    <title>Add Banner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #2c3e50;
            padding-top: 30px;
            border-radius: 0 15px 15px 0;
        }
        .sidebar h4 {
            color: #ecf0f1;
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            text-decoration: none;
            color: #bdc3c7;
            padding: 15px 20px;
            display: block;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #34495e;
            color: #fff;
        }
        .sidebar a.active {
            background-color: #1abc9c;
            color: white;
        }

        .content {
            margin-left: 270px;
            padding: 40px;
        }
        .content h3 {
            color: #2c3e50;
            font-weight: 600;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 270px;
            width: calc(100% - 270px);
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }

        .form-container .form-label {
            font-weight: 600;
        }

        .form-container input[type="text"], .form-container textarea, .form-container input[type="file"] {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
        }

        .form-container button {
            background-color: #1abc9c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #16a085;
        }

        .logout-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #e74c3c;
            color: #fff;
            padding: 15px 20px;
            border-radius: 50%;
            font-size: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Admin Dashboard</h4>
        <a href="dashboard.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact-settings.php">Contact</a>
        <a href="blog.php">Blog</a>
        <a href="faq-admin.php">FAQ</a>
    </div>

    <div class="content">
        <h3>Add New Banner</h3>

        <div class="form-container">
            <form action="add-banner.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Banner Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Banner Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Banner Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>

                <button type="submit" class="btn">Add Banner</button>
            </form>
        </div>
    </div>

    <a href="logout.php" class="logout-btn" title="Logout">🔑</a>

    <div class="footer">
        <p>&copy; <?= date("Y") ?> AutoCity Autoparts. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
