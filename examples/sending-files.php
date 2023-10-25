<?php

# This file is an example of how to send files to Telegram using this library.

use Mateodioev\Bots\Telegram\Api;
use Mateodioev\Bots\Telegram\Types\{InputFile, InputMediaDocument};

$api = new Api('YOUR BOT TOKEN');

// For send files use the class InputFile

// Send existing file in the telegram servers
$api->sendDocument(
    'CHAT_ID',
    InputFile::fromId('FILE_ID'),
    [
        'caption' => 'This is a caption'
        // For more options see the documentation
        // https://core.telegram.org/bots/api#senddocument
    ]
);

// Send a file from a URL
$api->sendDocument(
    'CHAT_ID',
    InputFile::fromUrl('https://example.com/file.pdf'),
    [
        'caption' => 'This is a caption'
        // For more options see the documentation
        // https://core.telegram.org/bots/api#senddocument
    ]
);

// Send a file from the local filesystem
$api->sendDocument(
    'CHAT_ID',
    InputFile::fromLocal('/path/to/file.pdf'),
    [
        'caption' => 'This is a caption'
        // For more options see the documentation
        // https://core.telegram.org/bots/api#senddocument
    ]
);

// Automatically detect the file type
$api->sendDocument(
    'CHAT_ID',
    InputFile::create('/path/to/file.pdf'), // File can be a file-id, url or a local file
    [
        'caption' => 'This is a caption'
        // For more options see the documentation
        // https://core.telegram.org/bots/api#senddocument
    ]
);

$medias = [ // You can send up to 10 files
    new InputMediaDocument(['media' => 'FILE_ID', 'caption' => 'This is a caption']),
    new InputMediaDocument(['media' => 'https://example.com/file.pdf', 'caption' => 'This is a caption']),
    // new InputMediaDocument(['media' => '/path/to/file.pdf', 'caption' => 'This is a caption']), Not supported yet
];
$api->sendMediaGroup('CHAT_ID', $medias, [
    'protect_content' => true // Protect the content of the files
]);
