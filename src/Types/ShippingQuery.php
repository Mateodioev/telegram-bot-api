<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object contains information about an incoming shipping query.
 * 
 * @property string          $id               Unique query identifier
 * @property User            $from             User who sent the query
 * @property string          $invoice_payload  Bot specified invoice payload
 * @property ShippingAddress $shipping_address User specified shipping address
 * 
 * @method string          id()
 * @method User            from()
 * @method string          invoicePayload()
 * @method ShippingAddress shippingAddress()
 * 
 * @method static setId(string $id)
 * @method static setFrom(User $from)
 * @method static setInvoicePayload(string $invoicePayload)
 * @method static setShippingAddress(ShippingAddress $shippingAddress)
 * 
 * @see https://core.telegram.org/bots/api#shippingquery
 */
class ShippingQuery extends baseType
{
    protected array $fields = [
        'id'               => 'string',
        'from'             => User::class,
        'invoice_payload'  => 'string',
        'shipping_address' => ShippingAddress::class,
    ];
}
