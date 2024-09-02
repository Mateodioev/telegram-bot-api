<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a service message about a user boosting a chat.
 *
 * @property int $boost_count Number of boosts added by the user
 *
 * @method int boostCount()
 *
 * @method static setBoostCount(int $boostCount)
 *
 * @see https://core.telegram.org/bots/api#chatboostadded
 */
class ChatBoostAdded extends abstractType
{
    public function __construct(
        int $boost_count,
    ) {
        parent::__construct([
            'boost_count' => $boost_count,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'boost_count' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
