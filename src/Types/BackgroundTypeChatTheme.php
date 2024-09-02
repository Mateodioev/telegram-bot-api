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
    public const TYPE = 'chat_theme';

    public function __construct(
        string $theme_name,
    ) {
        parent::__construct([
            'type'       => self::TYPE,
            'theme_name' => $theme_name,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'type'       => FieldType::single('string'),
            'theme_name' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
