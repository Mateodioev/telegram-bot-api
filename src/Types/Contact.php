<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a phone contact.
 *
 * @see https://core.telegram.org/bots/api#contact
 */
class Contact extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'phone_number' => FieldType::single('string'),
            'first_name'   => FieldType::single('string'),
            'last_name'    => FieldType::optional('string'),
            'user_id'      => FieldType::optional('integer'),
            'vcard'        => FieldType::optional('string'),
        ];
    }
}
