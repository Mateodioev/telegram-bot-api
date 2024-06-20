<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The withdrawal is in progress.
 *
 * @property string $type Type of the state, always "pending"
 *
 * @method string type()
 *
 * @method static setType(string $type)
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 */
class RevenueWithdrawalStatePending extends RevenueWithdrawalState
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
    }

    public static function default(): static
    {
        return (new static)->setType('pending');
    }
}
