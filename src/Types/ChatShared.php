<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object contains information about the chat whose identifier was shared with the bot using a [KeyboardButtonRequestChat](https://core.telegram.org/bots/api#keyboardbuttonrequestchat) button.
 * 
 * @property integer $request_id Identifier of the request
 * @property integer $chat_id    Identifier of the shared chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot may not have access to the chat and could be unable to use this identifier, unless the chat is already known to the bot by some other means.
 * 
 * @method integer requestId()
 * @method integer chatId()
 * 
 * @method static setRequestId(integer $requestId)
 * @method static setChatId(integer $chatId)
 * 
 * @see https://core.telegram.org/bots/api#chatshared
 */
class ChatShared extends baseType
{
    protected array $fields = [
        'request_id' => 'integer',
        'chat_id'    => 'integer',
    ];
}
