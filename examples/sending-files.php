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
    InputMediaDocument::default()
        ->setMedia('FILE_ID')
        ->setCaption('Sending a file using ID'),

    InputMediaDocument::default()
        ->setMedia('https://example.com/file.pdf')
        ->setCaption('This is a external file'),

    InputMediaDocument::default()
        // if you want to sent local file use Inputfile and set the second parameter to the file name
        ->setMedia(InputFile::fromLocal('/path/to/file', 'file name'))
        ->setCaption('This is a local file'),
];

$api->sendMediaGroup('CHAT_ID', $medias, [
    'protect_content' => true // Disable forward, download and share
]);
