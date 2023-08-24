<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @see https://core.telegram.org/bots/api#forumtopiccreated
 */
class ForumTopicCreated extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'name'                 => FieldType::single('string'),
            'icon_color'           => FieldType::single('integer'),
            'icon_custom_emoji_id' => FieldType::optional('string'),
        ];
    }
}
