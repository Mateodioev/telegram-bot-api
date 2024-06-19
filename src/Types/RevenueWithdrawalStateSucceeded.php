<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The withdrawal succeeded.
 *
 * @property string $type Type of the state, always "succeeded"
 * @property int $date Date the withdrawal was completed in Unix time
 * @property string $url An HTTPS URL that can be used to see transaction details
 *
 * @method string type()
 * @method int date()
 * @method string url()
 *
 * @method static setType(string $type)
 * @method static setDate(int $date)
 * @method static setUrl(string $url)
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded
 */
class RevenueWithdrawalStateSucceeded extends RevenueWithdrawalState
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
            'date' => FieldType::single('integer'),
            'url'  => FieldType::single('string'),
        ];
    }

    public static function default(): static
    {
        return (new static)->setType('succeeded');
    }
}
