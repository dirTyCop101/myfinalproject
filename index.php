<?php
// Establish a database connection
$host = 'localhost'; // Replace with your database host
$username = 'your_db_username'; // Replace with your database username
$password = 'your_db_password'; // Replace with your database password
$dbname = 'your_db_name'; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
// Fetch banners from the database
$query = "SELECT * FROM home_content ORDER BY created_at DESC LIMIT 4"; // Adjust the limit as needed
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Store the banners in an array
    $banners = [];
    while ($row = $result->fetch_assoc()) {
        $banners[] = $row;
    }
} else {
    $banners = [];
}
?>
