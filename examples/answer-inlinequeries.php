<?php

# This file is an example of how to answer inline queries

use Mateodioev\Bots\Telegram\Api;
use Mateodioev\Bots\Telegram\Inline\{
    InlineFactory as InlineF,
    InputMessageContentFactory as InputMessageF
};

$api = new Api('YOUR BOT TOKEN');

$api->answerInlineQuery(
    'QUERY_ID',
    InlineF::queryResults() // Max 50 results
        ->article(null, 'This is a inline result', InputMessageF::text('Test content of the inline result')) // pass null to parameter id to generate a random id
        ->article(null, 'This is another inline result', InputMessageF::text('Test content of the inline result')),
    [
        'cache_time' => 60, // Save the results for 60 seconds
        'button' => InlineF::resultsButton('Click me', startParameter: 'start from the inline result') // Button to be shown above inline query results
    ]
);
