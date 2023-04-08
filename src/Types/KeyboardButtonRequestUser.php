<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object defines the criteria used to request a suitable user. The identifier of the selected user will be shared with the bot when the corresponding button is pressed.
 * 
 * @property integer  $request_id      Signed 32-bit identifier of the request, which will be received back in the [UserShared](https://core.telegram.org/bots/api#usershared) object. Must be unique within the message
 * @property ?boolean $user_is_bot     Optional. Pass True to request a bot, pass False to request a regular user. If not specified, no additional restrictions are applied.
 * @property ?boolean $user_is_premium Optional. Pass True to request a premium user, pass False to request a non-premium user. If not specified, no additional restrictions are applied.
 * 
 * @method integer  requestId()
 * @method ?boolean userIsBot()
 * @method ?boolean userIsPremium()
 * 
 * @method static setRequestId(integer $requestId)
 * @method static setUserIsBot(boolean $userIsBot)
 * @method static setUserIsPremium(boolean $userIsPremium)
 * 
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestuser
 */
class KeyboardButtonRequestUser extends baseType
{
    protected array $fields = [
        'request_id'      => 'integer',
        'user_is_bot'     => 'boolean',
        'user_is_premium' => 'boolean',
    ];
}
