<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about an ownership change in the chat.
 *
 * @property User $new_owner The new owner of the chat
 *
 * @method User newOwner()
 *
 * @method static setNewOwner(User $newOwner)
 *
 * @see https://core.telegram.org/bots/api#chatownerchanged
 */
class ChatOwnerChanged extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'new_owner' => FieldType::single(User::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
