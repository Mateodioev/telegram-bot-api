<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes data sent from a Web App to the bot.
 *
 * @property string $data The data. Be aware that a bad client can send arbitrary data in this field.
 * @property string $button_text Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary data in this field.
 *
 * @method string data()
 * @method string buttonText()
 *
 * @method static setData(string $data)
 * @method static setButtonText(string $buttonText)
 *
 * @see https://core.telegram.org/bots/api#webappdata
 */
class WebAppData extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'data'        => FieldType::single('string'),
            'button_text' => FieldType::single('string'),
        ];
    }
}
