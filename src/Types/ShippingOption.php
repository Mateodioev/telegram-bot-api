<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one shipping option.
 *
 * @property string $id Shipping option identifier
 * @property string $title Option title
 * @property LabeledPrice[] $prices List of price portions
 *
 * @method string id()
 * @method string title()
 * @method LabeledPrice[] prices()
 *
 * @method static setId(string $id)
 * @method static setTitle(string $title)
 * @method static setPrices(LabeledPrice[] $prices)
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
