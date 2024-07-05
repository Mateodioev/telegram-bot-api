<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 *
 * @property int $request_id Identifier of the request
 * @property SharedUser[] $users Information about users shared with the bot.
 *
 * @method int requestId()
 * @method SharedUser[] users()
 *
 * @method static setRequestId(int $requestId)
 * @method static setUsers(SharedUser[] $users)
 *
 * @see https://core.telegram.org/bots/api#usersshared
 */
class UsersShared extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'request_id' => FieldType::single('integer'),
            'users'      => FieldType::multiple(SharedUser::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
