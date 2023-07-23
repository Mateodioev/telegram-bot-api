<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object contains information about the user whose identifier was shared with the bot using a {@see KeyboardButtonRequestUser} button.
 * 
 * @property integer $request_id Identifier of the request
 * @property integer $user_id    Identifier of the shared user. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot may not have access to the user and could be unable to use this identifier, unless the user is already known to the bot by some other means.
 * 
 * @method integer requestId()
 * @method integer userId()
 * 
 * @method static setRequestId(integer $requestId)
 * @method static setUserId(integer $userId)
 * 
 * @see https://core.telegram.org/bots/api#usershared
 */
class UserShared extends baseType
{
    protected array $fields = [
        'request_id' => 'integer',
        'user_id'    => 'integer',
    ];
}
