<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 * 
 * @property string           $title         Title of the game
 * @property string           $description   Description of the game
 * @property PhotoSize[]      $photo         Photo that will be displayed in the game message in chats.
 * @property ?string          $text          Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls [setGameScore](https://core.telegram.org/bots/api#setgamescore), or manually edited using [editMessageText](https://core.telegram.org/bots/api#editmessagetext). 0-4096 characters.
 * @property ?MessageEntity[] $text_entities Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
 * @property ?Animation       $animation     Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
 * 
 * @method string           title()
 * @method string           description()
 * @method PhotoSize[]      photo()
 * @method ?string          text()
 * @method ?MessageEntity[] textEntities()
 * @method ?Animation       animation()
 * 
 * @method static setTitle(string $title)
 * @method static setDescription(string $description)
 * @method static setPhoto(PhotoSize[] $photo)
 * @method static setText(string $text)
 * @method static setTextEntities(MessageEntity[] $textEntities)
 * @method static setAnimation(Animation $animation)
 * 
 * @see https://core.telegram.org/bots/api#game
 */
class Game extends baseType
{
    protected array $fields = [
        'title'         => 'string',
        'description'   => 'string',
        'photo'         => [PhotoSize::class],
        'text'          => 'string',
        'text_entities' => [MessageEntity::class],
        'animation'     => Animation::class,
    ];

    public function get()
    {
        return $this->recursiveGet();
    }
}
