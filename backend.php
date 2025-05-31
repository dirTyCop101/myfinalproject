<?php
header("Content-Type: application/json");

// === Database connection ===
$host = 'localhost';
$dbname = 'vendor_system';
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo json_encode(["reply" => "Database connection failed."]);
    exit;
}

// === Get user message ===
$data = json_decode(file_get_contents("php://input"), true);
$userMessage = strtolower(trim($data["message"] ?? ''));

// === Preprocess message for keywords ===
$cleaned = preg_replace("/[^a-zA-Z0-9\s]/", "", $userMessage);
$rawKeywords = explode(" ", $cleaned);
$keywords = array_map(function($word) {
    return rtrim($word, "s"); // crude stemming: brakes ➜ brake, pads ➜ pad
}, $rawKeywords);
$keywords = array_filter($keywords, fn($w) => strlen($w) > 2);

$keywords = array_filter($keywords, fn($word) => strlen($word) > 2); // Remove short/noise words

// === Build dynamic SQL query ===
$likeClauses = [];
$params = [];

foreach ($keywords as $i => $word) {
    $likeClauses[] = "(name LIKE :word$i OR description LIKE :word$i)";
    $params[":word$i"] = "%$word%";
}

$sql = "SELECT name, quantity, price FROM products WHERE " . implode(" OR ", $likeClauses) . " LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// === Return found products ===
if ($results && count($results) > 0) {
    $reply = "Here's what I found:\n";
    foreach ($results as $product) {
        $reply .= "- {$product['name']} (Qty: {$product['quantity']}) - GHS {$product['price']}\n";
    }
    echo json_encode(["reply" => nl2br($reply)]);
    exit;
}

     

// === No results found — fallback to ChatGPT ===
$OPENAI_API_KEY = "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"; 
$chatGptReply = askChatGPT($userMessage, $OPENAI_API_KEY);

echo json_encode(["reply" => $chatGptReply]);


// === ChatGPT call ===
function askChatGPT($prompt, $apiKey) {
    $ch = curl_init("https://api.openai.com/v1/chat/completions");

    $data = [
        "model" => "gpt-3.5-turbo",
        "messages" => [
            ["role" => "system", "content" => "You are Wrenchy, a Gen Z-style assistant for a car parts marketplace. You talk in a casual, funny, and chill tone. You help users with car parts info, and inventory. Avoid corporate or formal language. Throw in emojis and rizz when appropriate, but stay helpful and accurate. Only talk about cars or auto parts."],
            ["role" => "user", "content" => $prompt]
        ],
        "temperature" => 0.7,
        "max_tokens" => 200,
    ];

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $apiKey",
            "Content-Type: application/json"
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data)
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);

    if (isset($responseData["choices"][0]["message"]["content"])) {
        return trim($responseData["choices"][0]["message"]["content"]);
    } else {
        return "Sorry, I couldn't understand that.";
    }
}
