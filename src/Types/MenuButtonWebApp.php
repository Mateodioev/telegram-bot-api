<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a menu button, which launches a Web App.
 *
 * @property string $type Type of the button, must be web_app
 * @property string $text Text on the button
 * @property WebAppInfo $web_app Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Alternatively, a t.me link to a Web App of the bot can be specified in the object instead of the Web App's URL, in which case the Web App will be opened as if the user pressed the link.
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
    public const TYPE = 'web_app';

    public function __construct(
        string $text,
        WebAppInfo $web_app,
        string $type = self::TYPE,
    ) {
        parent::__construct([
            'type'    => $type,
            'text'    => $text,
            'web_app' => $web_app,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'type'    => FieldType::single('string'),
            'text'    => FieldType::single('string'),
            'web_app' => FieldType::single(WebAppInfo::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
