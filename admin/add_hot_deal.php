<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = intval($_POST['product_id']);
    $dealPrice = floatval($_POST['deal_price']);
    $dealExpires = $_POST['deal_expires'];

    // Validate inputs
    if (!$productId || !$dealPrice || !$dealExpires) {
        header("Location: admin/dashboard.php?error=Missing+fields");
        exit();
    }

    

    // Update the product to mark it as a hot deal
    $stmt = $conn->prepare("UPDATE products SET is_deal = 1, deal_price = ?, deal_expires = ? WHERE id = ?");
    $stmt->bind_param("dsi", $dealPrice, $dealExpires, $productId);

    if ($stmt->execute()) {
        header("Location: dashboard.php?success=Hot+deal+added+successfully");
    } else {
        header("Location: dashboard.php?error=Failed+to+add+hot+deal");
    }

    $stmt->close();
    $conn->close();
    exit();
} else {
    header("Location: dashboard.php");
    exit();
}
