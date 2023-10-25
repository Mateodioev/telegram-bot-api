<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 *
 * @property string $title Title of the game
 * @property string $description Description of the game
 * @property PhotoSize[] $photo Photo that will be displayed in the game message in chats.
 * @property string|null $text Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
 * @property MessageEntity[]|null $text_entities Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
 * @property Animation|null $animation Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
 *
 * @method string title()
 * @method string description()
 * @method PhotoSize[] photo()
 * @method string|null text()
 * @method MessageEntity[]|null textEntities()
 * @method Animation|null animation()
 *
 * @method static setTitle(string $title)
 * @method static setDescription(string $description)
 * @method static setPhoto(PhotoSize[] $photo)
 * @method static setText(string|null $text)
 * @method static setTextEntities(MessageEntity[]|null $textEntities)
 * @method static setAnimation(Animation|null $animation)
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
