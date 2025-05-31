<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = intval($_POST['product_id']);

    if (!$productId) {
        header("Location: dashboard.php?error=Invalid+product+ID");
        exit();
    }

    $stmt = $conn->prepare("UPDATE products SET is_deal = 0, deal_price = NULL, deal_expires = NULL WHERE id = ?");
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        header("Location: dashboard.php?success=Hot+deal+removed+successfully");
    } else {
        header("Location: dashboard.php?error=Failed+to+remove+hot+deal");
    }

    $stmt->close();
    $conn->close();
    exit();
} else {
    header("Location: dashboard.php");
    exit();
}
