<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The withdrawal failed and the transaction was refunded.
 *
 * @property string $type Type of the state, always "failed"
 *
 * @method string type()
 *
 * @method static setType(string $type)
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatefailed
 */
class RevenueWithdrawalStateFailed extends RevenueWithdrawalState
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
    }

    public static function default(): static
    {
        return (new static)->setType('failed');
    }
}
