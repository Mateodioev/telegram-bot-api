<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about an incoming shipping query.
 *
 * @property string $id Unique query identifier
 * @property User $from User who sent the query
 * @property string $invoice_payload Bot specified invoice payload
 * @property ShippingAddress $shipping_address User specified shipping address
 *
 * @method string id()
 * @method User from()
 * @method string invoicePayload()
 * @method ShippingAddress shippingAddress()
 *
 * @method static setId(string $id)
 * @method static setFrom(User $from)
 * @method static setInvoicePayload(string $invoicePayload)
 * @method static setShippingAddress(ShippingAddress $shippingAddress)
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
