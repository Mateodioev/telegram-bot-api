<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 *
 * @see https://core.telegram.org/bots/api#game
 */
class Game extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'title'         => FieldType::single('string'),
            'description'   => FieldType::single('string'),
            'photo'         => FieldType::multiple(PhotoSize::class),
            'text'          => FieldType::optional('string'),
            'text_entities' => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'animation'     => FieldType::optional(Animation::class),
        ];
    }
}
