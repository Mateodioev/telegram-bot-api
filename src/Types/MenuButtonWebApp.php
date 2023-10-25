<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a menu button, which launches a Web App.
 *
 * @property string $type Type of the button, must be web_app
 * @property string $text Text on the button
 * @property WebAppInfo $web_app Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
 *
 * @method string type()
 * @method string text()
 * @method WebAppInfo webApp()
 *
 * @method static setType(string $type)
 * @method static setText(string $text)
 * @method static setWebApp(WebAppInfo $webApp)
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

    public static function default(): static
    {
        return (new static())
            ->setType('web_app');
    }
}
