<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user. Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram. All the user needs to do is tap/click a button and confirm that they want to log in:
 * Telegram apps support these buttons as of version 5.7.
 *
 * @property string $url An HTTPS URL to be opened with user authorization data added to the query string when the button is pressed. If the user refuses to provide authorization data, the original URL without information about the user will be opened. The data added is the same as described in Receiving authorization data. NOTE: You must always check the hash of the received data to verify the authentication and the integrity of the data as described in Checking authorization.
 * @property string|null $forward_text Optional. New text of the button in forwarded messages.
 * @property string|null $bot_username Optional. Username of a bot, which will be used for user authorization. See Setting up a bot for more details. If not specified, the current bot's username will be assumed. The url's domain must be the same as the domain linked with the bot. See Linking your domain to the bot for more details.
 * @property bool|null $request_write_access Optional. Pass True to request the permission for your bot to send messages to the user.
 *
 * @method string url()
 * @method string|null forwardText()
 * @method string|null botUsername()
 * @method bool|null requestWriteAccess()
 *
 * @method static setUrl(string $url)
 * @method static setForwardText(string|null $forwardText)
 * @method static setBotUsername(string|null $botUsername)
 * @method static setRequestWriteAccess(bool|null $requestWriteAccess)
 *
 * @see https://core.telegram.org/bots/api#loginurl
 */
class LoginUrl extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'url'                  => FieldType::single('string'),
            'forward_text'         => FieldType::optional('string'),
            'bot_username'         => FieldType::optional('string'),
            'request_write_access' => FieldType::optional('boolean'),
        ];
    }
}
