<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @property string $name Name of the topic
 * @property int $icon_color Color of the topic icon in RGB format
 * @property string|null $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
 *
 * @method string name()
 * @method int iconColor()
 * @method string|null iconCustomEmojiId()
 *
 * @method static setName(string $name)
 * @method static setIconColor(int $iconColor)
 * @method static setIconCustomEmojiId(string|null $iconCustomEmojiId)
 *
 * @see https://core.telegram.org/bots/api#forumtopiccreated
 */
class ForumTopicCreated extends abstractType
{
    public function __construct(
        string $name,
        int $icon_color,
        ?string $icon_custom_emoji_id = null,
    ) {
        parent::__construct([
            'name'                 => $name,
            'icon_color'           => $icon_color,
            'icon_custom_emoji_id' => $icon_custom_emoji_id,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'name'                 => FieldType::single('string'),
            'icon_color'           => FieldType::single('integer'),
            'icon_custom_emoji_id' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
