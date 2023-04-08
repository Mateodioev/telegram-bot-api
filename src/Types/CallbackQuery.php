<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents an incoming callback query from a callback button in an inline keyboard.
 * If the button that originated the query was attached to a message sent by the bot, the field message will be present. If the button was attached to a message sent via the bot (in inline mode), the field inline_message_id will be present. Exactly one of the fields data or game_short_name will be present.
 * 
 * @property string  $id                Unique identifier for this query
 * @property User    $from              Sender
 * @property Message $message           Optional. Message with the callback button that originated the query. Note that message content and message date will not be available if the message is too old
 * @property string  $inline_message_id Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
 * @property string  $chat_instance     Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in [games](https://core.telegram.org/bots/api#games).
 * @property string  $data              Optional. Data associated with the callback button. Be aware that the message originated the query can contain no callback buttons with this data.
 * @property string  $game_short_name   Optional. Short name of a [Game](https://core.telegram.org/bots/api#games) to be returned, serves as the unique identifier for the game
 * 
 * @method string  id()              Unique identifier for this query
 * @method User    from()            Sender
 * @method Message message()         Message with the callback button that originated the query.
 * @method string  inlineMessageId() Identifier of the message sent via the bot in inline mode
 * @method string  chatInstance()    Global identifier
 * @method string  data()            Data associated with the callback button
 * @method string  gameShortName()   Short name of a [Game](https://core.telegram.org/bots/api#games)
 * 
 * @method static setId()
 * @method static setFrom()
 * @method static setMessage()
 * @method static setInlineMessageId()
 * @method static setChatInstance()
 * @method static setData()
 * @method static setGameShortName()
 * 
 * @see https://core.telegram.org/bots/api#callbackquery
 */
class CallbackQuery extends baseType
{
    protected array $fields = [
        'id'                => 'string',
        'from'              => User::class,
        'message'           => Message::class,
        'inline_message_id' => 'string',
        'chat_instance'     => 'string',
        'data'              => 'string',
        'game_short_name'   => 'string'
    ];
}
