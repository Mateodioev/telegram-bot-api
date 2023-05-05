<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Types\Response;

/**
 * Methods used in callback events
 */
trait Callbacks
{
    /**
     * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
     * 
     * @link https://core.telegram.org/bots/api#answercallbackquery
     * @return Response
     */
    public function answerCallbackQuery(string $callbackQueryId, string $text = '', array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(
                ['callback_query_id' => $callbackQueryId, 'text' => $text, ...$params],
                'answerCallbackQuery'
                )
        );
    }
}
