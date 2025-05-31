<?php
// Include the database connection file
include('db_connection.php');

// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle the request based on the action parameter
$action = $_POST['action'] ?? $_GET['action'];

switch ($action) {
    case 'add':
        addProduct($conn);
        break;
    case 'edit':
        updateProduct($conn);
        break;
    case 'delete':
        deleteProduct($conn);
        break;
    case 'list':
        listProducts($conn);
        break;
    case 'get':
        getProduct($conn);
        break;
}

function isProductVerified($conn, $product_brand) {
    // Convert the product_brand to lowercase for case-insensitive comparison
    $product_brand_lower = strtolower($product_brand);

    // Query to check if any product brand exists in the verified_products table
    $stmt = $conn->prepare("SELECT * FROM verified_products WHERE LOWER(product_brand) = ?");
    $stmt->bind_param('s', $product_brand_lower); // Use the lowercase brand for comparison
    $stmt->execute();
    $result = $stmt->get_result();
    
    // If we find a matching brand, the product is considered verified
    if ($result->num_rows > 0) {
        return true; // The product is verified
    } else {
        return false; // The product is not verified
    }
}





function addProduct($conn) {
    // Get product details from the form
    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand']; // Get the brand entered by the dealer
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_quantity = $_POST['product_quantity'];
    $product_condition = $_POST['product_condition'];
    $contact_phone = $_POST['contact_phone']; // Dealer's contact phone
    $contact_email = $_POST['contact_email']; // Dealer's contact email

    // Check if the product's brand is verified by checking the brand in the database
    if (!isProductVerified($conn, $product_brand)) {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'This product is not verified and cannot be posted.'
        ];
        header("Location: vendor.php");
        exit;
    }

    // Ensure vendor_id is set in the session
    if (!isset($_SESSION['vendor_id'])) {
        die("Error: Vendor ID is not set in the session.");
    }

    // Get the vendor ID from the session
    $vendor_id = $_SESSION['vendor_id'];

    // Handle image uploads
    $uploadedImages = uploadImages();

    // Prepare and execute product insert query
    $stmt = $conn->prepare("INSERT INTO products (name, category_id, price, description, quantity, `condition`, contact_phone, contact_email, product_images, vendor_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters and execute the insert query
    $stmt->bind_param('ssdssssssi', $product_name, $product_category, $product_price, $product_description, $product_quantity, $product_condition, $contact_phone, $contact_email, $uploadedImages, $vendor_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = [
            'type' => 'success',
            'text' => 'Product added successfully!'
        ];
        header("Location: vendor.php");
        exit;
    } else {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Failed to add product: ' . $stmt->error
        ];
        header("Location: vendor.php");
        exit;
    }
}






function updateProduct($conn) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_quantity = $_POST['product_quantity'];
    $product_condition = $_POST['product_condition'];
    $contact_phone = $_POST['contact_phone'];
    $contact_email = $_POST['contact_email'];

    // Fetch existing product data (including images)
    $stmt = $conn->prepare("SELECT product_images FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $existingImages = $product['product_images'];  // Get existing images from the database

    // Handle new images, if any
    $newImages = uploadImages();

    // If new images are uploaded, append them to the existing ones
    if ($newImages) {
        // Combine existing images with the new ones
        $uploadedImages = $existingImages ? $existingImages . ',' . $newImages : $newImages;
    } else {
        // No new images, use existing ones
        $uploadedImages = $existingImages;
    }

    // Prepare the SQL update query
    $stmt = $conn->prepare("UPDATE products SET name=?, category_id=?, price=?, description=?, quantity=?, `condition`=?, contact_phone=?, contact_email=?, product_images=? WHERE id=?");
    $stmt->bind_param('ssdssssssi', $product_name, $product_category, $product_price, $product_description, $product_quantity, $product_condition, $contact_phone, $contact_email, $uploadedImages, $product_id);

    // Check for errors in the SQL execution
    if ($stmt->execute()) {
        $_SESSION['message'] = [
            'type' => 'success',
            'text' => 'Product updated successfully!'
        ];
        header("Location: vendor.php");  // Redirect to vendor dashboard
        exit;
    } else {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Failed to update product: ' . $stmt->error
        ];
        header("Location: vendor.php");  // Redirect to vendor dashboard
        exit;
    }
}


function deleteProduct($conn) {
    $product_id = $_POST['id'];

    // Prepare and execute delete query
    $delete_query = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}

function listProducts($conn) {
    $vendor_id = $_SESSION['vendor_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE vendor_id=?");
    $stmt->bind_param('i', $vendor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $row['image'] = explode(',', $row['product_images'])[0]; // get first image
        $products[] = $row;
    }

    echo json_encode($products);
}

function getProduct($conn) {
    $product_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $product = $result->fetch_assoc();

    echo json_encode($product);
}

function uploadImages() {
    $uploadedImages = [];
    $targetDir = "uploads/";  // Make sure this ends with a single slash.

    // Create the target directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Check if there are multiple files
    if (!empty($_FILES['product_images']['name']) && is_array($_FILES['product_images']['name'])) {
        foreach ($_FILES['product_images']['name'] as $index => $fileName) {
            // Generate a unique filename using time() and basename() to avoid double "/uploads/"
            $targetFile = $targetDir . time() . "_" . basename($fileName);
            if (move_uploaded_file($_FILES['product_images']['tmp_name'][$index], $targetFile)) {
                $uploadedImages[] = $targetFile;
            }
        }
    } elseif (!empty($_FILES['product_images']['name'])) {
        // Handle single file upload
        $targetFile = $targetDir . time() . "_" . basename($_FILES['product_images']['name']);
        if (move_uploaded_file($_FILES['product_images']['tmp_name'], $targetFile)) {
            $uploadedImages[] = $targetFile;
        }
    }

    return implode(',', $uploadedImages);
}

?>
