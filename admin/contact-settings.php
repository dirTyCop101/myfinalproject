<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Fetch contact info
$query = "SELECT * FROM contact_info LIMIT 1";
$result = mysqli_query($conn, $query);
$contact = mysqli_fetch_assoc($result);

// Handle update
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone_1 = mysqli_real_escape_string($conn, $_POST['phone_1']);
    $phone_2 = mysqli_real_escape_string($conn, $_POST['phone_2']);
    $email_1 = mysqli_real_escape_string($conn, $_POST['email_1']);
    $email_2 = mysqli_real_escape_string($conn, $_POST['email_2']);

    $updateQuery = "
        UPDATE contact_info 
        SET address='$address', phone_1='$phone_1', phone_2='$phone_2', 
            email_1='$email_1', email_2='$email_2'
        WHERE id={$contact['id']}
    ";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: contact-settings.php?success=1");
        exit();
    } else {
        $error = "Update failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Info Settings</title>
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

        .footer {
            position: absolute;
            bottom: 20px;
            left: 270px;
            width: calc(100% - 270px);
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
    <div class="sidebar">
        <h4>Admin Dashboard</h4>
        <a href="dashboard.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact-settings.php" class="active">Contact</a>
        <a href="blog.php">Blog</a>
        <a href="faq-admin.php">FAQ</a>
    </div>

    <div class="content">
        <h3>Edit Contact Information</h3>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Contact info updated successfully.</div>
        <?php elseif (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"><?= $contact['address'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="phone_1" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="phone_1" name="phone_1" value="<?= $contact['phone_1'] ?>">
            </div>
            <div class="mb-3">
                <label for="phone_2" class="form-label">Hotline</label>
                <input type="text" class="form-control" id="phone_2" name="phone_2" value="<?= $contact['phone_2'] ?>">
            </div>
            <div class="mb-3">
                <label for="email_1" class="form-label">Primary Email</label>
                <input type="email" class="form-control" id="email_1" name="email_1" value="<?= $contact['email_1'] ?>">
            </div>
            <div class="mb-3">
                <label for="email_2" class="form-label">Support Email</label>
                <input type="email" class="form-control" id="email_2" name="email_2" value="<?= $contact['email_2'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update Contact Info</button>
        </form>
    </div>

    <a href="logout.php" class="logout-btn" title="Logout">🔑</a>

    <div class="footer">
        <p>&copy; <?= date("Y") ?> AutoCity Autoparts. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
