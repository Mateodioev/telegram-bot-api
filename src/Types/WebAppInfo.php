<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Describes a [Web App](https://core.telegram.org/bots/webapps).
 * 
 * @property string $url An HTTPS URL of a Web App to be opened with additional data as specified in [Initializing Web Apps](https://core.telegram.org/bots/webapps#initializing-web-apps)
 * 
 * @method string url()
 * 
 * @method static setUrl(string $url)
 * 
 * @see https://core.telegram.org/bots/api#webappinfo
 */
class WebAppInfo extends baseType
{
    protected array $fields = [
        'url' => 'string',
    ];
}
