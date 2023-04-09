<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a forum topic.
 * 
 * @property integer $message_thread_id    Unique identifier of the forum topic
 * @property string  $name                 Name of the topic
 * @property integer $icon_color           Color of the topic icon in RGB format
 * @property string  $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
 * 
 * @method integer messageThreadId()
 * @method string  name()
 * @method integer iconColor()
 * @method string  iconCustomEmojiId()
 * 
 * @method static setMessageThreadId(integer $messageThreadId)
 * @method static setName(string $name)
 * @method static setIconColor(integer $iconColor)
 * @method static setIconCustomEmojiId(string $iconCustomEmojiId)
 * 
 * @see https://core.telegram.org/bots/api#forumtopic
 */
class ForumTopic extends baseType
{
    protected array $fields = [
        'message_thread_id' => 'integer',
        'name' => 'string',
        'icon_color' => 'integer',
        'icon_custom_emoji_id' => 'string',
    ];
}
