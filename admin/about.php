<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Update About Us
if (isset($_POST['update_about'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imgName = basename($_FILES['image']['name']);
        $target = 'uploads/' . $imgName;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $query = "UPDATE about_us SET title='$title', description='$description', image='$imgName' WHERE id=1";
    } else {
        $query = "UPDATE about_us SET title='$title', description='$description' WHERE id=1";
    }

    mysqli_query($conn, $query);
    header("Location: about.php?about_updated=1");
    exit();
}

// Update Stats
if (isset($_POST['update_stats'])) {
    foreach ($_POST['value'] as $id => $value) {
        $value = intval($value);
        mysqli_query($conn, "UPDATE site_stats SET value = $value WHERE id = $id");
    }
    header("Location: about.php?stats_updated=1");
    exit();
}

// Fetch About Us
$about = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM about_us WHERE id = 1"));

// Fetch Stats
$stats = mysqli_query($conn, "SELECT * FROM site_stats ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit About Us & Stats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }

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
            flex: 1 0 auto;
        }

        .footer {
            flex-shrink: 0;
            background-color: #f8f9fa;
            padding: 15px 0;
            text-align: center;
            border-top: 1px solid #dee2e6;
            color: #7f8c8d;
            margin-left: 270px;
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

        .img-preview {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h4>Admin Dashboard</h4>
    <a href="dashboard.php">Home</a>
    <a href="about.php" class="active">About Us</a>
    <a href="contact-settings.php">Contact</a>
    <a href="blog.php">Blog</a>
    <a href="faq.php">FAQ</a>
</div>

<div class="content">
    <h3>Edit About Us</h3>

    <?php if (isset($_GET['about_updated'])): ?>
        <div class="alert alert-success">About Us updated successfully!</div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            <img src="uploads/<?= htmlspecialchars($about['image']) ?>" class="img-preview">
        </div>
        <div class="mb-3">
            <label class="form-label">Change Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($about['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="8" class="form-control" required><?= htmlspecialchars($about['description']) ?></textarea>
        </div>
        <button type="submit" name="update_about" class="btn btn-primary">Update About Us</button>
    </form>

    <hr class="my-5">

    <h3>Edit Project Statistics</h3>

    <?php if (isset($_GET['stats_updated'])): ?>
        <div class="alert alert-success">Stats updated successfully!</div>
    <?php endif; ?>

    <form method="POST">
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($stats)) : ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['label']) ?></h5>
                            <input type="number" name="value[<?= $row['id'] ?>]" class="form-control" value="<?= $row['value'] ?>" required>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <button type="submit" name="update_stats" class="btn btn-primary">Update Stats</button>
    </form>
</div>

<a href="logout.php" class="logout-btn" title="Logout">🔑</a>

<div class="footer">
    <p>&copy; <?= date("Y") ?> AutoCity Autoparts. All rights reserved.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
