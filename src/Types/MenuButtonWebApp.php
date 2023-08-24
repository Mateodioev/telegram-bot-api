<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a menu button, which launches a Web App.
 *
 * @see https://core.telegram.org/bots/api#menubuttonwebapp
 */
class MenuButtonWebApp extends MenuButton
{
    protected function boot(): void
    {
        $this->fields = [
            'type'    => FieldType::single('string'),
            'text'    => FieldType::single('string'),
            'web_app' => FieldType::single(WebAppInfo::class),
        ];
    }
}
