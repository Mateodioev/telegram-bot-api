<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The reaction is paid.
 *
 * @property string $type Type of the reaction, always "paid"
 *
 * @method string type()
 *
 * @method static setType(string $type)
 *
 * @see https://core.telegram.org/bots/api#reactiontypepaid
 */
class ReactionTypePaid extends ReactionType
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
