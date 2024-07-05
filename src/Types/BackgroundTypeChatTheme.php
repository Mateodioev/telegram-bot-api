<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The background is taken directly from a built-in chat theme.
 *
 * @property string $type Type of the background, always "chat_theme"
 * @property string $theme_name Name of the chat theme, which is usually an emoji
 *
 * @method string type()
 * @method string themeName()
 *
 * @method static setType(string $type)
 * @method static setThemeName(string $themeName)
 *
 * @see https://core.telegram.org/bots/api#backgroundtypechattheme
 */
class BackgroundTypeChatTheme extends BackgroundType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'       => FieldType::single('string'),
            'theme_name' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('chat_theme');
    }
}
