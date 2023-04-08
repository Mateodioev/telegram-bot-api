<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
 * 
 * @property string          $type Element type. One of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”, “phone_number”, “email”.
 * @property ?string         $data Optional. Base64-encoded encrypted Telegram Passport element data provided by the user, available for “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport” and “address” types. Can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property ?string         $phone_number Optional. User's verified phone number, available only for “phone_number” type
 * @property ?string         $email Optional. User's verified email address, available only for “email” type
 * @property ?PassportFile[] $files Optional. Array of encrypted files with documents provided by the user, available for “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property ?PassportFile   $fron_side Optional. Encrypted file with the front side of the document, provided by the user. Available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property ?PassportFile   $reverse_side Optional. Encrypted file with the reverse side of the document, provided by the user. Available for “driver_license” and “identity_card”. The file can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property ?PassportFile   $selfie Optional. Encrypted file with the selfie of the user holding a document, provided by the user; available for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property ?PassportFile[] $translation Optional. Array of encrypted files with translated versions of documents provided by the user. Available if requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be decrypted and verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
 * @property ?string         $hash Base64-encoded element hash for using in [PassportElementErrorUnspecified](https://core.telegram.org/bots/api#passportelementerrorunspecified).
 * 
 * @method string          type()
 * @method ?string         data()
 * @method ?string         phoneNumber()
 * @method ?string         email()
 * @method ?PassportFile[] files()
 * @method ?PassportFile   fronSide()
 * @method ?PassportFile   reverseSide()
 * @method ?PassportFile   selfie()
 * @method ?PassportFile[] translation()
 * @method ?string         hash()
 * 
 * @method static setType(string $type)
 * @method static setData(string $data)
 * @method static setPhoneNumber(string $phoneNumber)
 * @method static setEmail(string $email)
 * @method static setFiles(PassportFile[] $files)
 * @method static setFronSide(PassportFile $fronSide)
 * @method static setReverseSide(PassportFile $reverseSide)
 * @method static setSelfie(PassportFile $selfie)
 * @method static setTranslation(PassportFile[] $translation)
 * @method static setHash(string $hash)
 * 
 * @see https://core.telegram.org/bots/api#encryptedpassportelement
 */
class EncryptedPassportElement extends baseType
{
    protected array $fields = [
        'type'         => 'string',
        'data'         => 'string',
        'phone_number' => 'string',
        'email'        => 'string',
        'files'        => [PassportFile::class],
        'fron_side'    => PassportFile::class,
        'reverse_side' => PassportFile::class,
        'selfie'       => PassportFile::class,
        'translation'  => [PassportFile::class],
        'hash'         => 'string',
    ];

    public function get() {
        return $this->recursiveGet();
    }
}
