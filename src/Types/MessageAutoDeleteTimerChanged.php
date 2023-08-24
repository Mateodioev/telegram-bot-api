<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about a change in auto-delete timer settings.
 *
 * @property int $message_auto_delete_time New auto-delete time for messages in the chat; in seconds
 *
 * @method int messageAutoDeleteTime()
 *
 * @method static setMessageAutoDeleteTime(int $messageAutoDeleteTime)
 *
 * @see https://core.telegram.org/bots/api#messageautodeletetimerchanged
 */
class MessageAutoDeleteTimerChanged extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'message_auto_delete_time' => FieldType::single('integer'),
        ];
    }
}
