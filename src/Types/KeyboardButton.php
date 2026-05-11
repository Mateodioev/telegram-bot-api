<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents one button of the reply keyboard. At most one of the fields other than text, icon_custom_emoji_id, and style must be used to specify the type of the button. For simple text buttons, String can be used instead of this object to specify the button text.
 *
 * @property string $text Text of the button. If none of the fields other than text, icon_custom_emoji_id, and style are used, it will be sent as a message when the button is pressed
 * @property string|null $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown before the text of the button. Can only be used by bots that purchased additional usernames on Fragment or in the messages directly sent by the bot to private, group and supergroup chats if the owner of the bot has a Telegram Premium subscription.
 * @property string|null $style Optional. Style of the button. Must be one of "danger" (red), "success" (green) or "primary" (blue). If omitted, then an app-specific style is used.
 * @property KeyboardButtonRequestUsers|null $request_users Optional. If specified, pressing the button will open a list of suitable users. Identifiers of selected users will be sent to the bot in a "users_shared" service message. Available in private chats only.
 * @property KeyboardButtonRequestChat|null $request_chat Optional. If specified, pressing the button will open a list of suitable chats. Tapping on a chat will send its identifier to the bot in a "chat_shared" service message. Available in private chats only.
 * @property KeyboardButtonRequestManagedBot|null $request_managed_bot Optional. If specified, pressing the button will ask the user to create and share a bot that will be managed by the current bot. Available for bots that enabled management of other bots in the @BotFather Mini App. Available in private chats only.
 * @property bool|null $request_contact Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only.
 * @property bool|null $request_location Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only.
 * @property KeyboardButtonPollType|null $request_poll Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only.
 * @property WebAppInfo|null $web_app Optional. If specified, the described Web App will be launched when the button is pressed. The Web App will be able to send a "web_app_data" service message. Available in private chats only.
 *
 * @method string text()
 * @method string|null iconCustomEmojiId()
 * @method string|null style()
 * @method KeyboardButtonRequestUsers|null requestUsers()
 * @method KeyboardButtonRequestChat|null requestChat()
 * @method KeyboardButtonRequestManagedBot|null requestManagedBot()
 * @method bool|null requestContact()
 * @method bool|null requestLocation()
 * @method KeyboardButtonPollType|null requestPoll()
 * @method WebAppInfo|null webApp()
 *
 * @method static setText(string $text)
 * @method static setIconCustomEmojiId(string|null $iconCustomEmojiId)
 * @method static setStyle(string|null $style)
 * @method static setRequestUsers(KeyboardButtonRequestUsers|null $requestUsers)
 * @method static setRequestChat(KeyboardButtonRequestChat|null $requestChat)
 * @method static setRequestManagedBot(KeyboardButtonRequestManagedBot|null $requestManagedBot)
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
            'text'                 => FieldType::single('string'),
            'icon_custom_emoji_id' => FieldType::optional('string'),
            'style'                => FieldType::optional('string'),
            'request_users'        => FieldType::optional(KeyboardButtonRequestUsers::class),
            'request_chat'         => FieldType::optional(KeyboardButtonRequestChat::class),
            'request_managed_bot'  => FieldType::optional(KeyboardButtonRequestManagedBot::class),
            'request_contact'      => FieldType::optional('boolean'),
            'request_location'     => FieldType::optional('boolean'),
            'request_poll'         => FieldType::optional(KeyboardButtonPollType::class),
            'web_app'              => FieldType::optional(WebAppInfo::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
