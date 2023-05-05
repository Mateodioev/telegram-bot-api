<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding the bot to the attachment menu or launching a Web App from a link.
 * 
 * @property ?string $web_app_name
 * 
 * @method ?string webAppName()
 * 
 * @method static setWebAppName()
 * 
 * @see https://core.telegram.org/bots/api#writeaccessallowed
 */
class WriteAccessAllowed extends baseType
{
    protected array $fields = [
        'web_app_name' => 'string'
    ];
}
