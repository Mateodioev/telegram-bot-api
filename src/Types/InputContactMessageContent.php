<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of a contact message to be sent as the result of an inline query.
 *
 * @property string $phone_number Contact's phone number
 * @property string $first_name Contact's first name
 * @property ?string $last_name Optional. Contact's last name
 * @property ?string $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
 *
 * @method string phoneNumber()
 * @method string firstName()
 * @method ?string lastName()
 * @method ?string vcard()
 *
 * @method static setPhoneNumber(string $phoneNumber)
 * @method static setFirstName(string $firstName)
 * @method static setLastName(?string $lastName)
 * @method static setVcard(?string $vcard)
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
