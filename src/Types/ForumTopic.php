<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a forum topic.
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
