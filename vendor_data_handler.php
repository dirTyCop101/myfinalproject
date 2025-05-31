<?php
// Start session
session_start();

// Include the database connection file
include('db_connection.php');

// Check if the request is for getting vendor info
if (isset($_GET['action']) && $_GET['action'] === 'get_vendor_info') {

    // Check if vendor is logged in
    if (!isset($_SESSION['vendor_id'])) {
        echo json_encode(["status" => "error", "message" => "Vendor not logged in."]);
        exit;
    }

    $vendor_id = $_SESSION['vendor_id'];

    // Query vendor info from vendordash table
    $stmt = $conn->prepare("
        SELECT 
            CONCAT(first_name, ' ', last_name) AS name,
            (SELECT COUNT(*) FROM products p WHERE p.vendor_id = v.id) AS total_products,
            (SELECT COUNT(*) FROM products p WHERE p.vendor_id = v.id AND p.status = 'active') AS active_products,
            (SELECT IFNULL(SUM(p.views), 0) FROM products p WHERE p.vendor_id = v.id) AS total_views,
            (SELECT COUNT(*) FROM inquiries i WHERE i.vendor_id = v.id) AS total_inquiries
        FROM vendordash v
        WHERE v.id = ?
    ");

    $stmt->bind_param('i', $vendor_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $vendorData = $result->fetch_assoc();
        echo json_encode(["status" => "success", "data" => $vendorData]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to fetch vendor info", "error_detail" => $stmt->error]);
    }

    $stmt->close();
}
?>
