<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session at the very top

// Connect to your DB
$conn = new mysqli("localhost", "root", "", "vendor_system"); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// REGISTER
if (isset($_POST['register'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['register_email']);
    $password = $_POST['register_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Check if email is already in use
    $stmt = $conn->prepare("SELECT id FROM vendordash WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        die("Email is already in use.");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into vendordash table
    $stmt = $conn->prepare("INSERT INTO vendordash (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Get the newly inserted vendor's ID
        $vendor_id = $stmt->insert_id;

        // Store vendor info in session
        $_SESSION['vendor_id'] = $vendor_id;
        $_SESSION['vendor_name'] = $first_name;

        // Use JavaScript to open the vendor dashboard in a new tab and redirect to login page
        echo "<script>
            window.open('vendor.php', '_blank'); // Open vendor dashboard in a new tab
            window.location.href = 'login-register.php'; // Redirect to login-register page (or you can change this)
        </script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

// LOGIN
if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists in the database
    $query = "SELECT * FROM vendordash WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($vendor = $result->fetch_assoc()) {
        // Check password
        if (password_verify($password, $vendor['password'])) {
            $_SESSION['vendor_id'] = $vendor['id'];
            $_SESSION['vendor_name'] = $vendor['first_name'];

            // Open the vendor dashboard in a new tab and redirect to login-register page
            echo "<script>
                window.open('vendor.php', '_blank'); // Open vendor dashboard in a new tab
                window.location.href = 'login-register.php?success=1'; // redirect to login-register page
            </script>";
            exit();
        } else {
            // Wrong password
            header("Location: login-register.php?error=Incorrect password");
            exit();
        }
    } else {
        // Email not found
        header("Location: login-register.php?error=Email not found");
        exit();
    }
}

?>
