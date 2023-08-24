<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one shipping option.
 *
 * @see https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'     => FieldType::single('string'),
            'title'  => FieldType::single('string'),
            'prices' => FieldType::multiple(LabeledPrice::class),
        ];
    }
}
