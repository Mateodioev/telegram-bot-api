<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes the access settings of a bot.
 *
 * @property bool $is_access_restricted True, if only selected users can access the bot. The bot's owner can always access it.
 * @property User[]|null $added_users Optional. The list of other users who have access to the bot if the access is restricted
 *
 * @method bool isAccessRestricted()
 * @method User[]|null addedUsers()
 *
 * @method static setIsAccessRestricted(bool $isAccessRestricted)
 * @method static setAddedUsers(User[]|null $addedUsers)
 *
 * @see https://core.telegram.org/bots/api#botaccesssettings
 */
class BotAccessSettings extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'is_access_restricted' => FieldType::single('boolean'),
            'added_users'          => new FieldType(User::class, allowArrays: true, allowNull: true, subTypes: []),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
