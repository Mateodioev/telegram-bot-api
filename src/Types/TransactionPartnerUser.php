<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes a transaction with a user.
 *
 * @property string $type Type of the transaction partner, always "user"
 * @property User $user Information about the user
 *
 * @method string type()
 * @method User user()
 *
 * @method static setType(string $type)
 * @method static setUser(User $user)
 *
 * @see https://core.telegram.org/bots/api#transactionpartneruser
 */
class TransactionPartnerUser extends TransactionPartner
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
            'user' => FieldType::single(User::class),
        ];
    }

    public static function default(): static
    {
        return (new static)->setType('user');
    }
}
