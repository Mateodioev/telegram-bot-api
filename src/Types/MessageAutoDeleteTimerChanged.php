<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about a change in auto-delete timer settings.
 * 
 * @property integer $message_auto_delete_time New auto-delete time for messages in the chat; in seconds
 * 
 * @method integer messageAutoDeleteTime()
 * 
 * @method static setMessageAutoDeleteTime(integer $messageAutoDeleteTime)
 * 
 * @see https://core.telegram.org/bots/api#messageautodeletetimerchanged
 */
class MessageAutoDeleteTimerChanged extends baseType
{
    protected array $fields = [
        'message_auto_delete_time' => 'integer',
    ];
}
