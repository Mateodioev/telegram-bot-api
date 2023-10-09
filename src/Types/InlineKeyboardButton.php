<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 *
 * @property string $text Label text on the button
 * @property string|null $url Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used to mention a user by their ID without using a username, if this is allowed by their privacy settings.
 * @property string|null $callback_data Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
 * @property WebAppInfo|null $web_app Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in private chats between a user and the bot.
 * @property LoginUrl|null $login_url Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
 * @property string|null $switch_inline_query Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which case just the bot's username will be inserted.
 * @property string|null $switch_inline_query_current_chat Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will be inserted. This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting something from multiple options.
 * @property SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field
 * @property CallbackGame|null $callback_game Optional. Description of the game that will be launched when the user presses the button. NOTE: This type of button must always be the first button in the first row.
 * @property bool|null $pay Optional. Specify True, to send a Pay button. NOTE: This type of button must always be the first button in the first row and can only be used in invoice messages.
 *
 * @method string text()
 * @method string|null url()
 * @method string|null callbackData()
 * @method WebAppInfo|null webApp()
 * @method LoginUrl|null loginUrl()
 * @method string|null switchInlineQuery()
 * @method string|null switchInlineQueryCurrentChat()
 * @method SwitchInlineQueryChosenChat|null switchInlineQueryChosenChat()
 * @method CallbackGame|null callbackGame()
 * @method bool|null pay()
 *
 * @method static setText(string $text)
 * @method static setUrl(string|null $url)
 * @method static setCallbackData(string|null $callbackData)
 * @method static setWebApp(WebAppInfo|null $webApp)
 * @method static setLoginUrl(LoginUrl|null $loginUrl)
 * @method static setSwitchInlineQuery(string|null $switchInlineQuery)
 * @method static setSwitchInlineQueryCurrentChat(string|null $switchInlineQueryCurrentChat)
 * @method static setSwitchInlineQueryChosenChat(SwitchInlineQueryChosenChat|null $switchInlineQueryChosenChat)
 * @method static setCallbackGame(CallbackGame|null $callbackGame)
 * @method static setPay(bool|null $pay)
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButton extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'text'                             => FieldType::single('string'),
            'url'                              => FieldType::optional('string'),
            'callback_data'                    => FieldType::optional('string'),
            'web_app'                          => FieldType::optional(WebAppInfo::class),
            'login_url'                        => FieldType::optional(LoginUrl::class),
            'switch_inline_query'              => FieldType::optional('string'),
            'switch_inline_query_current_chat' => FieldType::optional('string'),
            'switch_inline_query_chosen_chat'  => FieldType::optional(SwitchInlineQueryChosenChat::class),
            'callback_game'                    => FieldType::optional(CallbackGame::class),
            'pay'                              => FieldType::optional('boolean'),
        ];
    }
}
