<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

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
    public const TYPE = 'pending';

    public function __construct(
        string $type = self::TYPE,
    ) {
        parent::__construct([
            'type' => $type,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
