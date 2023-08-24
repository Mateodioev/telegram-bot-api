<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about an incoming shipping query.
 *
 * @see https://core.telegram.org/bots/api#shippingquery
 */
class ShippingQuery extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'               => FieldType::single('string'),
            'from'             => FieldType::single(User::class),
            'invoice_payload'  => FieldType::single('string'),
            'shipping_address' => FieldType::single(ShippingAddress::class),
        ];
    }
}
