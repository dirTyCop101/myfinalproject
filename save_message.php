<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['con_name']));
    $email = htmlspecialchars(trim($_POST['con_email']));
    $subject = htmlspecialchars(trim($_POST['con_subject']));
    $message = htmlspecialchars(trim($_POST['con_message']));

    $directory = __DIR__ . '/messages';
    $file = $directory . '/messages.txt';

    // Check if uploads folder exists, if not create it
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true); // 0777 permissions for full access
    }

    // Check if file exists, if not create it
    if (!file_exists($file)) {
        file_put_contents($file, "Messages Received:\n\n");
    }

    // Prepare content to save
    $content = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message\n----------------------\n";

    // Append message
    file_put_contents($file, $content, FILE_APPEND);

    // Return a JS script that triggers the alert and reloads page
    echo "<script>alert('Thank you! Your message has been received.'); window.location.href=document.referrer;</script>";
}
?>
