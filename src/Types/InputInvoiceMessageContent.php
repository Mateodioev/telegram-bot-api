<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of an invoice message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputinvoicemessagecontent
 */
class InputInvoiceMessageContent extends InputMessageContent
{
    protected function boot(): void
    {
        $this->fields = [
            'title'                         => FieldType::single('string'),
            'description'                   => FieldType::single('string'),
            'payload'                       => FieldType::single('string'),
            'provider_token'                => FieldType::single('string'),
            'currency'                      => FieldType::single('string'),
            'prices'                        => FieldType::multiple(LabeledPrice::class),
            'max_tip_amount'                => FieldType::optional('integer'),
            'suggested_tip_amounts'         => new FieldType('integer', allowArrays: true, allowNull: true, subTypes: []),
            'provider_data'                 => FieldType::optional('string'),
            'photo_url'                     => FieldType::optional('string'),
            'photo_size'                    => FieldType::optional('integer'),
            'photo_width'                   => FieldType::optional('integer'),
            'photo_height'                  => FieldType::optional('integer'),
            'need_name'                     => FieldType::optional('boolean'),
            'need_phone_number'             => FieldType::optional('boolean'),
            'need_email'                    => FieldType::optional('boolean'),
            'need_shipping_address'         => FieldType::optional('boolean'),
            'send_phone_number_to_provider' => FieldType::optional('boolean'),
            'send_email_to_provider'        => FieldType::optional('boolean'),
            'is_flexible'                   => FieldType::optional('boolean'),
        ];
    }
}
