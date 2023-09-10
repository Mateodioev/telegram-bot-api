<?php

# This file is an example of how to use the library

use Mateodioev\Bots\Telegram\Api;
use Mateodioev\Bots\Telegram\Config\ParseMode;
use Mateodioev\Bots\Telegram\Config\Types;
use Mateodioev\Bots\Telegram\Exception\TelegramApiException;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

$api = new Api('YOUR BOT TOKEN');

// Send messages
$api->sendMessage('CHAT_ID', 'Hello world!', [
    'parse_mode' => ParseMode::HTML // or 'HTML'
    // For other params see https://core.telegram.org/bots/api#sendmessage
]);

// Reply to a message
$api->replyTo(
    'CHAT_ID',
    'This is a reply message',
    'MESSAGE_ID',
    ParseMode::HTML,
    [
        // For other params see https://core.telegram.org/bots/api#sendmessage
    ]
);


// Return an array of Update object
$updates = $api->getUpdates();
foreach ($updates as $update) {
    var_dump($update->updateId());
}

// Catch errors

// Be sure to enable this option, otherwise the library will not throw exceptions and return an instance of \Mateodioev\Bots\Telegram\Types\Error
Types::setThrowExceptionOnFail(true);

try {
    $api->sendMessage('CHAT_ID', 'Hello world!');
} catch (TelegramParamException $e) {
    echo $e->getMessage(); // Invalid parameter
} catch (TelegramApiException $e) {
    echo $e->getMessage(); // Bad request: chat not found
}
