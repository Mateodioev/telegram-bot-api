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
 * @property bool|null $is_name_implicit Optional. True, if the name of the topic wasn't specified explicitly by its creator and likely needs to be changed by the bot
 *
 * @method string name()
 * @method int iconColor()
 * @method string|null iconCustomEmojiId()
 * @method bool|null isNameImplicit()
 *
 * @method static setName(string $name)
 * @method static setIconColor(int $iconColor)
 * @method static setIconCustomEmojiId(string|null $iconCustomEmojiId)
 * @method static setIsNameImplicit(bool|null $isNameImplicit)
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
            'is_name_implicit'     => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
