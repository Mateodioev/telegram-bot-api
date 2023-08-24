<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a Game.
 * Note: This will only work in Telegram versions released after October 1, 2016. Older clients will not display any inline results if a game result is among them.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultgame
 */
class InlineQueryResultGame extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'            => FieldType::single('string'),
            'id'              => FieldType::single('string'),
            'game_short_name' => FieldType::single('string'),
            'reply_markup'    => FieldType::optional(InlineKeyboardMarkup::class),
        ];
    }
}
