<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The message was originally sent by a known user.
 *
 * @property string $type Type of the message origin, always "user"
 * @property int $date Date the message was sent originally in Unix time
 * @property User $sender_user User that sent the message originally
 *
 * @method string type()
 * @method int date()
 * @method User senderUser()
 *
 * @method static setType(string $type)
 * @method static setDate(int $date)
 * @method static setSenderUser(User $senderUser)
 *
 * @see https://core.telegram.org/bots/api#messageoriginuser
 */
class MessageOriginUser extends MessageOrigin
{
    protected function boot(): void
    {
        $this->fields = [
            'type'        => FieldType::single('string'),
            'date'        => FieldType::single('integer'),
            'sender_user' => FieldType::single(User::class),
        ];
    }
}
