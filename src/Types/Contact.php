<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a phone contact.
 * 
 * @property string   $phone_number Contact's phone number
 * @property string   $first_name Contact's first name
 * @property ?string  $last_name Optional. Contact's last name
 * @property ?integer $user_id Optional. Contact's user identifier in Telegram. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property ?string  $vcard Optional. Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard)
 * 
 * @method string   phoneNumber()
 * @method string   firstName()
 * @method ?string  lastName()
 * @method ?integer userId()
 * @method ?string  vcard()
 * 
 * @method static setPhoneNumber(string $phoneNumber)
 * @method static setFirstName(string $firstName)
 * @method static setLastName(string $lastName)
 * @method static setUserId(integer $userId)
 * @method static setVcard(string $vcard)
 * 
 * @see https://core.telegram.org/bots/api#contact
 */
class Contact extends baseType
{
    protected array $fields = [
        'phone_number' => 'string',
        'first_name'   => 'string',
        'last_name'    => 'string',
        'user_id'      => 'integer',
        'vcard'        => 'string',
    ];
}
