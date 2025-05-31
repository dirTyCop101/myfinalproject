<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Add new FAQ
if (isset($_POST['add_faq'])) {
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $answer = mysqli_real_escape_string($conn, $_POST['answer']);

    $insert_query = "INSERT INTO faq (question, answer) VALUES ('$question', '$answer')";
    if (mysqli_query($conn, $insert_query)) {
        header("Location: faq-admin.php");
        exit;
    } else {
        echo "<script>alert('Error adding FAQ');</script>";
    }
}

// Delete FAQ
if (isset($_GET['delete'])) {
    $faq_id = intval($_GET['delete']);
    $delete_query = "DELETE FROM faq WHERE id = '$faq_id'";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: faq-admin.php");
        exit;
    } else {
        echo "<script>alert('Error deleting FAQ');</script>";
    }
}

// Fetch FAQs
$result = mysqli_query($conn, "SELECT * FROM faq ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>FAQ Admin Panel</title>
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
            margin-left: 270px;
            padding: 20px;
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
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
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Admin Dashboard</h4>
        <a href="dashboard.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact-settings.php">Contact</a>
        <a href="blog.php">Blog</a>
        <a href="faq-admin.php" class="active">FAQ</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h3>Manage FAQs</h3>
        <p>Add, edit, or delete FAQs for your platform.</p>

        <!-- Add New FAQ Form -->
        <h4>Add New FAQ</h4>
        <form method="POST" action="faq-admin.php">
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" class="form-control" id="question" name="question" required>
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Answer</label>
                <textarea class="form-control" id="answer" name="answer" rows="4" required></textarea>
            </div>
            <button type="submit" name="add_faq" class="btn btn-success">Add FAQ</button>
        </form>

        <!-- FAQ List -->
        <h4 class="mt-5">Existing FAQs</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['question']) ?></td>
                        <td><?= htmlspecialchars($row['answer']) ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="edit-faq.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="faq-admin.php?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?= date("Y") ?> AutoCity Autoparts. All rights reserved.</p>
    </div>

    <a href="logout.php" class="logout-btn" title="Logout">🔑</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
