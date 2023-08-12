<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\Types;

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 * 
 * @property string                       $text                             Label text on the button
 * @property ?string                      $url                              Optional. HTTP or tg:// URL to be opened when the button is pressed. Links `tg://user?id=<user_id>` can be used to mention a user by their ID without using a username, if this is allowed by their privacy settings.
 * @property ?string                      $callback_data                    Optional. Data to be sent in a [callback query](https://core.telegram.org/bots/api#callbackquery) to the bot when button is pressed, 1-64 bytes
 * @property ?WebAppInfo                  $web_app                          Optional. Description of the [Web App](https://core.telegram.org/bots/webapps) that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method [answerWebAppQuery](https://core.telegram.org/bots/api#answerwebappquery). Available only in private chats between a user and the bot
 * @property ?LoginUrl                    $login_url                        Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the [Telegram Login Widget](https://core.telegram.org/widgets/login).
 * @property ?string                      $switch_inline_query              Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which case just the bot's username will be inserted.
 * @property ?string                      $switch_inline_query_current_chat Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will be inserted
 * @property ?SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat  Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field
 * @property ?CallbackGame                $callback_game                    Optional. Description of the game that will be launched when the user presses the button.
 * @property ?boolean                     $pay                              Optional. Specify True, to send a [Pay button](https://core.telegram.org/bots/api#payments).
 * 
 * @method string                       text()
 * @method ?string                      url()
 * @method ?string                      callbackData()
 * @method ?WebAppInfo                  webApp()
 * @method ?LoginUrl                    loginUrl()
 * @method ?string                      switchInlineQuery()
 * @method ?string                      switchInlineQueryCurrentChat()
 * @method ?SwitchInlineQueryChosenChat switchInlineQueryChosenChat()
 * @method ?CallbackGame                callbackGame()
 * @method ?boolean                     pay()
 * 
 * @method static setText(string $text)
 * @method static setUrl(string $url)
 * @method static setCallbackData(string $callbackData)
 * @method static setWebApp(WebAppInfo $webApp)
 * @method static setLoginUrl(LoginUrl $loginUrl)
 * @method static setSwitchInlineQuery(string $switchInlineQuery)
 * @method static setSwitchInlineQueryCurrentChat(string $switchInlineQueryCurrentChat)
 * @method static setSwitchInlineQueryChosenChat(SwitchInlineQueryChosenChat $switchInlineQueryChosenChat)
 * @method static setCallbackGame(CallbackGame $callbackGame)
 * @method static setPay(boolean $pay)
 * 
 * @see https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButton extends baseType
{
    protected array $fields = [
        'text'                             => 'string',
        'url'                              => 'string',
        'callback_data'                    => 'string',
        'web_app'                          => WebAppInfo::class,
        'login_url'                        => LoginUrl::class,
        'switch_inline_query'              => 'string',
        'switch_inline_query_current_chat' => 'string',
        'switch_inline_query_chosen_chat'  => SwitchInlineQueryChosenChat::class,
        'callback_game'                    => CallbackGame::class,
        'pay'                              => 'boolean',
    ];
}
