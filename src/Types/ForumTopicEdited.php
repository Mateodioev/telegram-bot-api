<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about an edited forum topic.
 * 
 * @property ?string $name                 Optional. New name of the topic, if it was edited
 * @property ?string $icon_custom_emoji_id Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
 * 
 * @method ?string name()
 * @method ?string iconCustomEmojiId()
 * 
 * @method static setName(string $name)
 * @method static setIconCustomEmojiId(string $iconCustomEmojiId)
 * 
 * @see https://core.telegram.org/bots/api#forumtopicedited
 */
class ForumTopicEdited extends baseType
{
    protected array $fields = [
        'name'                 => 'string',
        'icon_custom_emoji_id' => 'string',
    ];
}
