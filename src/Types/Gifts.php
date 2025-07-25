<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represent a list of gifts.
 *
 * @property Gift[] $gifts The list of gifts
 *
 * @method Gift[] gifts()
 *
 * @method static setGifts(Gift[] $gifts)
 *
 * @see https://core.telegram.org/bots/api#gifts
 */
class Gifts extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'gifts' => FieldType::array(Gift::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
