<?php

# This file is an example of how to use the Api class to send messages with buttons

use Mateodioev\Bots\Telegram\Api;
use Mateodioev\Bots\Telegram\Buttons\ButtonFactory;
use Mateodioev\Bots\Telegram\Types\InlineKeyboardButton;
use Mateodioev\Bots\Telegram\Types\KeyboardButton;

$api = new Api('YOUR BOT TOKEN');

// This sends a message with 2 inline buttons
$api->sendMessage('CHAT_ID', 'testing buttons', [
    'reply_markup' => (string) ButtonFactory::inlineKeyboardMarkup()
        ->addCeil(
            InlineKeyboardButton::default()
                ->setText('Button 1')
                ->setUrl('https://google.com')
        )->addCeil(
            InlineKeyboardButton::default()
                ->setText('Button 2')
                ->setCallbackData('button2')
        )
]);

// This sends a message with 2 reply buttons
$api->sendMessage('CHAT_ID', 'testing buttons', [
    'reply_markup' => (string) ButtonFactory::replyKeyboardMarkup(resizeKeyboard: true)
        ->addCeil( // Single button
            KeyboardButton::default()
                ->setText('Button 1')
        )->addCeil( // Send user phone number as a contact
            KeyboardButton::default()
                ->setText('Button 2')
                ->setRequestContact(true)
        )
]);

// This sends a message and this a reply interface to the user
$api->sendMessage('CHAT_ID', 'testing buttons', [
    'reply_markup' => (string) ButtonFactory::forceReply()->enableSelective() // Only reply to the user who sent the message or if the user is mentioned in the text message
]);

// This sends a message and remove the button
$api->sendMessage('CHAT_ID', 'testing buttons', [
    'reply_markup' => (string) ButtonFactory::replyKeyboardRemove() // Remove the button to all users
    // ButtonFactory::replyKeyboardRemove(true) remove the button to selective users
]);