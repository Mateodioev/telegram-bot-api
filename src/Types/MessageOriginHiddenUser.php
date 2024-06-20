<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The message was originally sent by an unknown user.
 *
 * @property string $type Type of the message origin, always "hidden_user"
 * @property int $date Date the message was sent originally in Unix time
 * @property string $sender_user_name Name of the user that sent the message originally
 *
 * @method string type()
 * @method int date()
 * @method string senderUserName()
 *
 * @method static setType(string $type)
 * @method static setDate(int $date)
 * @method static setSenderUserName(string $senderUserName)
 *
 * @see https://core.telegram.org/bots/api#messageoriginhiddenuser
 */
class MessageOriginHiddenUser extends MessageOrigin
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'type'             => FieldType::single('string'),
            'date'             => FieldType::single('integer'),
            'sender_user_name' => FieldType::single('string'),
        ];
    }
}
