<?php
session_start();
require_once 'includes/db.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->fetch_assoc()) {
        $error = "Username already exists.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insert = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $insert->bind_param("ss", $username, $hashedPassword);
        if ($insert->execute()) {
            $_SESSION['admin'] = $username; // Auto login
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Something went wrong. Try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            background: url('../assets/images/admin-reg.avif') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.8); /* White background with slight transparency */
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            max-width: 450px;
            width: 100%;
        }

        .register-card img {
            width: 80px;
            margin-bottom: 15px;
            animation: popIn 0.6s ease-in-out;
        }

        h2 {
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes popIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #4b7bec;
        }

        .btn-custom {
            background-color: #4b7bec;
            border: none;
        }

        .btn-custom:hover {
            background-color: #3c6edc;
        }

        .footer-link {
            font-size: 14px;
            margin-top: 15px;
            display: block;
            color: #4b7bec;
            text-decoration: none;
        }

        .footer-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-card text-center">
        <img src="https://img.icons8.com/ios-filled/100/admin-settings-male.png" alt="Admin Icon" />
        <h2>Admin Register</h2>
        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php elseif ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" class="text-start">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-custom w-100 py-2">Register</button>
        </form>

        <a href="login.php" class="footer-link">Already have an account? Login</a>
    </div>
</body>
</html>
