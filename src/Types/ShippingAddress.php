<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a shipping address.
 *
 * @see https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'country_code' => FieldType::single('string'),
            'state'        => FieldType::single('string'),
            'city'         => FieldType::single('string'),
            'street_line1' => FieldType::single('string'),
            'street_line2' => FieldType::single('string'),
            'post_code'    => FieldType::single('string'),
        ];
    }
}
