<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one button of the reply keyboard. For simple text buttons, String can be used instead of this object to specify the button text. The optional fields web_app, request_user, request_chat, request_contact, request_location, and request_poll are mutually exclusive.
 * Note: request_contact and request_location options will only work in Telegram versions released after 9 April, 2016. Older clients will display unsupported message.
 * Note: request_poll option will only work in Telegram versions released after 23 January, 2020. Older clients will display unsupported message.
 * Note: web_app option will only work in Telegram versions released after 16 April, 2022. Older clients will display unsupported message.
 * Note: request_user and request_chat options will only work in Telegram versions released after 3 February, 2023. Older clients will display unsupported message.
 *
 * @property string $text Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
 * @property KeyboardButtonRequestUser|null $request_user Optional. If specified, pressing the button will open a list of suitable users. Tapping on any user will send their identifier to the bot in a "user_shared" service message. Available in private chats only.
 * @property KeyboardButtonRequestChat|null $request_chat Optional. If specified, pressing the button will open a list of suitable chats. Tapping on a chat will send its identifier to the bot in a "chat_shared" service message. Available in private chats only.
 * @property bool|null $request_contact Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only.
 * @property bool|null $request_location Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only.
 * @property KeyboardButtonPollType|null $request_poll Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only.
 * @property WebAppInfo|null $web_app Optional. If specified, the described Web App will be launched when the button is pressed. The Web App will be able to send a "web_app_data" service message. Available in private chats only.
 *
 * @method string text()
 * @method KeyboardButtonRequestUser|null requestUser()
 * @method KeyboardButtonRequestChat|null requestChat()
 * @method bool|null requestContact()
 * @method bool|null requestLocation()
 * @method KeyboardButtonPollType|null requestPoll()
 * @method WebAppInfo|null webApp()
 *
 * @method static setText(string $text)
 * @method static setRequestUser(KeyboardButtonRequestUser|null $requestUser)
 * @method static setRequestChat(KeyboardButtonRequestChat|null $requestChat)
 * @method static setRequestContact(bool|null $requestContact)
 * @method static setRequestLocation(bool|null $requestLocation)
 * @method static setRequestPoll(KeyboardButtonPollType|null $requestPoll)
 * @method static setWebApp(WebAppInfo|null $webApp)
 *
 * @see https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'text'             => FieldType::single('string'),
            'request_user'     => FieldType::optional(KeyboardButtonRequestUser::class),
            'request_chat'     => FieldType::optional(KeyboardButtonRequestChat::class),
            'request_contact'  => FieldType::optional('boolean'),
            'request_location' => FieldType::optional('boolean'),
            'request_poll'     => FieldType::optional(KeyboardButtonPollType::class),
            'web_app'          => FieldType::optional(WebAppInfo::class),
        ];
    }
}
