<?php

namespace Mateodioev\Bots\Telegram\Inline;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Types\{InlineQueryResultsButton, WebhookInfo};

final class InlineFactory
{
    /**
     * Create new InlineQueryResultsFactory instance.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresult
     * @return InlineQueryResultsFactory
     */
    public static function inlineQueryResults(): InlineQueryResultsFactory
    {
        return new InlineQueryResultsFactory();
    }

    /**
     * Alias of inlineQueryResults
     *
     * @see InlineFactory::inlineQueryResults()
     * @return InlineQueryResultsFactory
     */
    public static function queryResults(): InlineQueryResultsFactory
    {
        return self::inlineQueryResults();
    }

    /**
     * Button to be shown above inline query results.
     * You must use exactly one of the optional fields.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultsbutton
     * @throws TelegramParamException
     */
    public static function inlineQueryResultsButton(string $text, ?WebhookInfo $webApp = null, ?string $startParameter = null): InlineQueryResultsButton
    {
        if ($webApp && $startParameter)
            throw new TelegramParamException('You can only set one of the parameters "webApp" or "startParameter"');

        return new InlineQueryResultsButton([
            'text' => $text,
            'web_app' => $webApp,
            'start_parameter' => $startParameter
        ]);
    }

    /**
     * Alias of InlineFactory::inlineQueryResultsButton
     * @see InlineFactory::inlineQueryResultsButton()
     */
    public static function resultsButton(string $text, ?WebhookInfo $webApp = null, ?string $startParameter = null): InlineQueryResultsButton
    {
        return self::inlineQueryResultsButton($text, $webApp, $startParameter);
    }
}