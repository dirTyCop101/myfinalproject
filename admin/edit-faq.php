<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Get the FAQ ID
if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request.'); window.location = 'faq-admin.php';</script>";
    exit();
}

$faq_id = intval($_GET['id']);

// Fetch FAQ data
$query = "SELECT * FROM faq WHERE id = $faq_id";
$result = mysqli_query($conn, $query);
$faq = mysqli_fetch_assoc($result);

if (!$faq) {
    echo "<script>alert('FAQ not found.'); window.location = 'faq-admin.php';</script>";
    exit();
}

// Handle update form submission
if (isset($_POST['update_faq'])) {
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $answer = mysqli_real_escape_string($conn, $_POST['answer']);

    $update_query = "UPDATE faq SET question = '$question', answer = '$answer' WHERE id = $faq_id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('FAQ updated successfully'); window.location = 'faq-admin.php';</script>";
    } else {
        echo "<script>alert('Error updating FAQ');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h3>Edit FAQ</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" class="form-control" id="question" name="question" value="<?= $faq['question'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Answer</label>
                <textarea class="form-control" id="answer" name="answer" rows="4" required><?= $faq['answer'] ?></textarea>
            </div>
            <button type="submit" name="update_faq" class="btn btn-primary">Update FAQ</button>
            <a href="faq-admin.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
