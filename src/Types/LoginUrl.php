<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user. Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram. All the user needs to do is tap/click a button and confirm that they want to log in:
 * 
 * @property string   $url                  An HTTPS URL to be opened with user authorization data added to the query string when the button is pressed. If the user refuses to provide authorization data, the original URL without information about the user will be opened. The data added is the same as described in [Receiving authorization data](https://core.telegram.org/widgets/login#receiving-authorization-data).
 * @property ?string  $forward_text         Optional. New text of the button in forwarded messages.
 * @property ?string  $bot_username         Optional. Username of a bot, which will be used for user authorization. See [Setting up a bot](https://core.telegram.org/widgets/login#setting-up-a-bot) for more details. If not specified, the current bot's username will be assumed. The url's domain must be the same as the domain linked with the bot. See [Linking your domain to the bot](https://core.telegram.org/widgets/login#linking-your-domain-to-the-bot) for more details.
 * @property ?boolean $request_write_access Optional. Pass True to request the permission for your bot to send messages to the user.
 * 
 * @method string   url()
 * @method ?string  forwardText()
 * @method ?string  botUsername()
 * @method ?boolean requestWriteAccess()
 * 
 * @method static setUrl(string $url)
 * @method static setForwardText(string $forwardText)
 * @method static setBotUsername(string $botUsername)
 * @method static setRequestWriteAccess(boolean $requestWriteAccess)
 * 
 * @see https://core.telegram.org/bots/api#loginurl
 */
class LoginUrl extends baseType
{
    protected array $fields = [
        'url'                  => 'string',
        'forward_text'         => 'string',
        'bot_username'         => 'string',
        'request_write_access' => 'boolean',
    ];
}
