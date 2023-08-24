<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of a contact message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputcontactmessagecontent
 */
class InputContactMessageContent extends InputMessageContent
{
    protected function boot(): void
    {
        $this->fields = [
            'phone_number' => FieldType::single('string'),
            'first_name'   => FieldType::single('string'),
            'last_name'    => FieldType::optional('string'),
            'vcard'        => FieldType::optional('string'),
        ];
    }
}
