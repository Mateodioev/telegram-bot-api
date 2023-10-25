<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a forum topic.
 *
 * @property int $message_thread_id Unique identifier of the forum topic
 * @property string $name Name of the topic
 * @property int $icon_color Color of the topic icon in RGB format
 * @property string|null $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
 *
 * @method int messageThreadId()
 * @method string name()
 * @method int iconColor()
 * @method string|null iconCustomEmojiId()
 *
 * @method static setMessageThreadId(int $messageThreadId)
 * @method static setName(string $name)
 * @method static setIconColor(int $iconColor)
 * @method static setIconCustomEmojiId(string|null $iconCustomEmojiId)
 *
 * @see https://core.telegram.org/bots/api#forumtopic
 */
class ForumTopic extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'message_thread_id'    => FieldType::single('integer'),
            'name'                 => FieldType::single('string'),
            'icon_color'           => FieldType::single('integer'),
            'icon_custom_emoji_id' => FieldType::optional('string'),
        ];
    }
}
