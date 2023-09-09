<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Inline\InlineQueryResultsFactory;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;

use Mateodioev\Bots\Telegram\Types\SentWebAppMessage;

trait inlineMode
{
    /**
     * Use this method to send answers to an inline query.
     *
     * @see https://core.telegram.org/bots/api#answerinlinequery
     */
    public function answerInlineQuery(string $inlineQueryID, InlineQueryResultsFactory $results, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['inline_query_id' => $inlineQueryID, 'results' => $results->toJson(), ...$params])
                ->setMethod('answerInlineQuery')
        );
    }

    /**
     * Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated.
     */
    public function answerWebAppQuery(string $webAppQueryID, InlineQueryResultsFactory $results, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['web_app_query_id' => $webAppQueryID, 'results' => $results->toJson(), ...$params])
                ->setMethod('answerWebAppQuery')
                ->setReturnType(SentWebAppMessage::class)
        );
    }
}