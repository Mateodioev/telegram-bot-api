<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a unique message identifier.
 * 
 * @property integer $message_id Unique message identifier
 * 
 * @method integer messageId()
 * 
 * @method static setMessageId(integer $messageId)
 * 
 * @see https://core.telegram.org/bots/api#messageid
 */
class MessageId extends baseType
{
    protected array $fields = [
        'message_id' => 'integer',
    ];
}
