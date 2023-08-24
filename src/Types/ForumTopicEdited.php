<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about an edited forum topic.
 *
 * @see https://core.telegram.org/bots/api#forumtopicedited
 */
class ForumTopicEdited extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'name'                 => FieldType::optional('string'),
            'icon_custom_emoji_id' => FieldType::optional('string'),
        ];
    }
}
