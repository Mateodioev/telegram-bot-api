<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a Game.
 *
 * @property string $type Type of the result, must be game
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $game_short_name Short name of the game
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 *
 * @method string type()
 * @method string id()
 * @method string gameShortName()
 * @method InlineKeyboardMarkup|null replyMarkup()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setGameShortName(string $gameShortName)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
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

    public static function default(): static
    {
        return (new static())
            ->setType('game');
    }
}
