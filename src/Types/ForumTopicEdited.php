<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a service message about an edited forum topic.
 *
 * @property string|null $name Optional. New name of the topic, if it was edited
 * @property string|null $icon_custom_emoji_id Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
 *
 * @method string|null name()
 * @method string|null iconCustomEmojiId()
 *
 * @method static setName(string|null $name)
 * @method static setIconCustomEmojiId(string|null $iconCustomEmojiId)
 *
 * @see https://core.telegram.org/bots/api#forumtopicedited
 */
class ForumTopicEdited extends abstractType
{
    public function __construct(
        ?string $name = null,
        ?string $icon_custom_emoji_id = null,
    ) {
        parent::__construct([
            'name'                 => $name,
            'icon_custom_emoji_id' => $icon_custom_emoji_id,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'name'                 => FieldType::optional('string'),
            'icon_custom_emoji_id' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
