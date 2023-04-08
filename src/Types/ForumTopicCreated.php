<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about a new forum topic created in the chat.
 * 
 * @property string  $name                 Name of the topic
 * @property integer $icon_color           Color of the topic icon in RGB format
 * @property string  $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
 * 
 * @method string  name()
 * @method integer iconColor()
 * @method string  iconCustomEmojiId()
 * 
 * @method static setName(string $name)
 * @method static setIconColor(integer $iconColor)
 * @method static setIconCustomEmojiId(string $iconCustomEmojiId)
 * 
 * @see https://core.telegram.org/bots/api#forumtopiccreated
 */
class ForumTopicCreated extends baseType
{
    protected array $fields = [
        'name'                 => 'string',
        'icon_color'           => 'integer',
        'icon_custom_emoji_id' =>  'string',
    ];
}
