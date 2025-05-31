<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

$errors = [];
$action = isset($_GET['action']) ? $_GET['action'] : 'view';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$post = null;

if ($action === 'edit' && $id) {
    $postQuery = mysqli_query($conn, "SELECT * FROM blog_posts WHERE id = $id");
    if ($postQuery && mysqli_num_rows($postQuery) > 0) {
        $post = mysqli_fetch_assoc($postQuery);
    } else {
        $errors[] = "Blog post not found.";
        $action = 'view';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $post_date = $_POST['post_date'];
    $image = $_FILES['image']['name'] ?? '';

    if ($action == 'add' || $action == 'edit') {
        $target = "blog_uploads/" . basename($image);
        if ($action == 'add' && empty($image)) {
            $errors[] = "Image is required.";
        }
        if (empty($title) || empty($content) || empty($post_date)) {
            $errors[] = "All fields are required.";
        }

        if (empty($errors)) {
            if ($action == 'add') {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $sql = "INSERT INTO blog_posts (title, content, post_date, image)
                            VALUES ('$title', '$content', '$post_date', '$image')";
                    if (mysqli_query($conn, $sql)) {
                        header("Location: blog.php");
                        exit;
                    } else {
                        $errors[] = "Database error: " . mysqli_error($conn);
                    }
                } else {
                    $errors[] = "Image upload failed.";
                }
            }

            if ($action == 'edit' && $id) {
                $update = "";

                if (!empty($image)) {
                    $target = "blog_uploads/" . basename($image);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        $getImage = mysqli_query($conn, "SELECT image FROM blog_posts WHERE id = $id");
                        $row = mysqli_fetch_assoc($getImage);
                        if ($row && file_exists("blog_uploads/" . $row['image'])) {
                            unlink("blog_uploads/" . $row['image']);
                        }
                        $update = "UPDATE blog_posts SET title='$title', content='$content', post_date='$post_date', image='$image' WHERE id=$id";
                    } else {
                        $errors[] = "Image upload failed.";
                    }
                } else {
                    $update = "UPDATE blog_posts SET title='$title', content='$content', post_date='$post_date' WHERE id=$id";
                }

                if (empty($errors) && !empty($update)) {
                    if (mysqli_query($conn, $update)) {
                        header("Location: blog.php");
                        exit;
                    } else {
                        $errors[] = "Database error: " . mysqli_error($conn);
                    }
                }
            }
        }
    }

    
}

if ($action == 'delete') {
        if ($id) {
            $getImage = mysqli_query($conn, "SELECT image FROM blog_posts WHERE id = $id");
            $row = mysqli_fetch_assoc($getImage);
            if ($row && file_exists("blog_uploads/" . $row['image'])) {
                unlink("blog_uploads/" . $row['image']);
            }
            $delete = "DELETE FROM blog_posts WHERE id = $id";
            mysqli_query($conn, $delete);
            header("Location: blog.php");
            exit;
        }
    }

$query = "SELECT * FROM blog_posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Blog Posts</title>
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
            position: fixed;
            bottom: 0;
            left: 270px;
            width: calc(100% - 270px);
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
            background-color: #2c3e50;
            padding: 10px 0;
            z-index: 999;
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

        .banner-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Admin Dashboard</h4>
        <a href="dashboard.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact-settings.php">Contact</a>
        <a href="blog.php" class="active">Blog</a>
        <a href="faq-admin.php">FAQ</a>
    </div>

    <div class="content">
        <h3>Manage Blog Posts</h3>

        <?php if ($action == 'add' || $action == 'edit') : ?>
            <h4><?= $action == 'add' ? 'Add New' : 'Edit' ?> Blog Post</h4>

            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="blog.php?action=<?= $action ?>&id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" value="<?= $post['title'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label>Content:</label>
                    <textarea name="content" class="form-control" rows="5" required><?= $post['content'] ?? '' ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Post Date:</label>
                    <input type="date" name="post_date" class="form-control" value="<?= $post['post_date'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label>Blog Image:</label>
                    <?php if ($action == 'edit' && isset($post['image'])) : ?>
                        <p>Current Image:</p>
                        <img src="blog_uploads/<?= $post['image'] ?>" width="150" alt="Current Image">
                        <br><label>Change Image (optional):</label>
                    <?php endif; ?>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <button type="submit" class="btn btn-success"><?= $action == 'add' ? 'Publish' : 'Update' ?></button>
                <a href="blog.php" class="btn btn-secondary">Cancel</a>
            </form>

        <?php else : ?>
            <a href="blog.php?action=add" class="btn btn-success mb-3">Add New Blog Post</a>

            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <img src="blog_uploads/<?= $row['image'] ?>" class="card-img-top" alt="Blog Image">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['title'] ?></h5>
                                <p class="card-text"><?= substr($row['content'], 0, 100) ?>...</p>
                                <p class="text-muted">Posted on <?= date('d-m-y', strtotime($row['post_date'])) ?></p>
                                <a href="blog.php?action=edit&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="blog.php?action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

   

    <div class="footer">
         <a href="logout.php" class="logout-btn" title="Logout">🔑</a>
        <p>&copy; <?= date("Y") ?> AutoCity Autoparts. All rights reserved.</p>
    </div>
</body>
</html>
