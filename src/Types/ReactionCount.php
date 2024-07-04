<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * Represents a reaction added to a message along with the number of times it was added.
 *
 * @property ReactionType $type Type of the reaction
 * @property int $total_count Number of times the reaction was added
 *
 * @method ReactionType type()
 * @method int totalCount()
 *
 * @method static setType(ReactionType $type)
 * @method static setTotalCount(int $totalCount)
 *
 * @see https://core.telegram.org/bots/api#reactioncount
 */
class ReactionCount extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'        => FieldType::single(ReactionType::class),
            'total_count' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
