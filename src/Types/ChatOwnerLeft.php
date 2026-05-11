<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about the chat owner leaving the chat.
 *
 * @property User|null $new_owner Optional. The user who will become the new owner of the chat if the previous owner does not return to the chat
 *
 * @method User|null newOwner()
 *
 * @method static setNewOwner(User|null $newOwner)
 *
 * @see https://core.telegram.org/bots/api#chatownerleft
 */
class ChatOwnerLeft extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'new_owner' => FieldType::optional(User::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
