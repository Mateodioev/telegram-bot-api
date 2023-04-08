<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Describes data sent from a [Web App](https://core.telegram.org/bots/webapps) to the bot.
 * 
 * @property string $data        The data. Be aware that a bad client can send arbitrary data in this field.
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
class WebAppData extends baseType
{
    protected array $fields = [
        'data'        => 'string',
        'button_text' => 'string',
    ];
}
