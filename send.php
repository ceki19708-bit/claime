<?php
// send_telegram.php
// Simple server-side relay to send messages to Telegram Bot API.
// SECURITY: Put your bot token here. Do NOT expose this file publicly.

// === Configuration ===
$BOT_TOKEN = '7210917381:AAGPxkv9Y3dqnBj_rHOtWvvuIyg9qHlpFrg'; // 

// Read raw body (expecting JSON)
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    // support form-encoded fallback
    $data = $_POST;
}

$text = isset($data['text']) ? $data['text'] : '';
$chat_id = isset($data['chat_id']) ? $data['5160818690'] : '';

if (empty($BOT_TOKEN) || $BOT_TOKEN === '7210917381:AAGPxkv9Y3dqnBj_rHOtWvvuIyg9qHlpFrg') {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Bot token not configured on server.']);
    exit;
}

if (empty($chat_id) || empty($text)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Missing chat_id or text']);
    exit;
}

$url = "https://api.telegram.org/bot" . urlencode($BOT_TOKEN) . "/sendMessage";

$payload = json_encode([
    'chat_id' => $chat_id,
    'text' => $text
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$result = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

if ($result === false) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => $err]);
    exit;
}

// forward Telegram response
header('Content-Type: application/json');
echo $result;


?>
