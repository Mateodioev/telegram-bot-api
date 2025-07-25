<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes the connection of the bot with a business account.
 *
 * @property string $id Unique identifier of the business connection
 * @property User $user Business account user that created the business connection
 * @property int $user_chat_id Identifier of a private chat with the user who created the business connection. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property int $date Date the connection was established in Unix time
 * @property BusinessBotRights|null $rights Optional. Rights of the business bot
 * @property bool $is_enabled True, if the connection is active
 *
 * @method string id()
 * @method User user()
 * @method int userChatId()
 * @method int date()
 * @method BusinessBotRights|null rights()
 * @method bool isEnabled()
 *
 * @method static setId(string $id)
 * @method static setUser(User $user)
 * @method static setUserChatId(int $userChatId)
 * @method static setDate(int $date)
 * @method static setRights(BusinessBotRights|null $rights)
 * @method static setIsEnabled(bool $isEnabled)
 *
 * @see https://core.telegram.org/bots/api#businessconnection
 */
class BusinessConnection extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'           => FieldType::single('string'),
            'user'         => FieldType::single(User::class),
            'user_chat_id' => FieldType::single('integer'),
            'date'         => FieldType::single('integer'),
            'rights'       => FieldType::optional(BusinessBotRights::class),
            'is_enabled'   => FieldType::single('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
