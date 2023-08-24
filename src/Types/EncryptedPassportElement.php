<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
 *
 * @property string $type Element type. One of "personal_details", "passport", "driver_license", "identity_card", "internal_passport", "address", "utility_bill", "bank_statement", "rental_agreement", "passport_registration", "temporary_registration", "phone_number", "email".
 * @property ?string $data Optional. Base64-encoded encrypted Telegram Passport element data provided by the user, available for "personal_details", "passport", "driver_license", "identity_card", "internal_passport" and "address" types. Can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property ?string $phone_number Optional. User's verified phone number, available only for "phone_number" type
 * @property ?string $email Optional. User's verified email address, available only for "email" type
 * @property ?PassportFile[] $files Optional. Array of encrypted files with documents provided by the user, available for "utility_bill", "bank_statement", "rental_agreement", "passport_registration" and "temporary_registration" types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property ?PassportFile $front_side Optional. Encrypted file with the front side of the document, provided by the user. Available for "passport", "driver_license", "identity_card" and "internal_passport". The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property ?PassportFile $reverse_side Optional. Encrypted file with the reverse side of the document, provided by the user. Available for "driver_license" and "identity_card". The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property ?PassportFile $selfie Optional. Encrypted file with the selfie of the user holding a document, provided by the user; available for "passport", "driver_license", "identity_card" and "internal_passport". The file can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property ?PassportFile[] $translation Optional. Array of encrypted files with translated versions of documents provided by the user. Available if requested for "passport", "driver_license", "identity_card", "internal_passport", "utility_bill", "bank_statement", "rental_agreement", "passport_registration" and "temporary_registration" types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
 * @property string $hash Base64-encoded element hash for using in PassportElementErrorUnspecified
 *
 * @method string type()
 * @method ?string data()
 * @method ?string phoneNumber()
 * @method ?string email()
 * @method ?PassportFile[] files()
 * @method ?PassportFile frontSide()
 * @method ?PassportFile reverseSide()
 * @method ?PassportFile selfie()
 * @method ?PassportFile[] translation()
 * @method string hash()
 *
 * @method static setType(string $type)
 * @method static setData(?string $data)
 * @method static setPhoneNumber(?string $phoneNumber)
 * @method static setEmail(?string $email)
 * @method static setFiles(?PassportFile[] $files)
 * @method static setFrontSide(?PassportFile $frontSide)
 * @method static setReverseSide(?PassportFile $reverseSide)
 * @method static setSelfie(?PassportFile $selfie)
 * @method static setTranslation(?PassportFile[] $translation)
 * @method static setHash(string $hash)
 *
 * @see https://core.telegram.org/bots/api#encryptedpassportelement
 */
class EncryptedPassportElement extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'         => FieldType::single('string'),
            'data'         => FieldType::optional('string'),
            'phone_number' => FieldType::optional('string'),
            'email'        => FieldType::optional('string'),
            'files'        => new FieldType(PassportFile::class, allowArrays: true, allowNull: true, subTypes: []),
            'front_side'   => FieldType::optional(PassportFile::class),
            'reverse_side' => FieldType::optional(PassportFile::class),
            'selfie'       => FieldType::optional(PassportFile::class),
            'translation'  => new FieldType(PassportFile::class, allowArrays: true, allowNull: true, subTypes: []),
            'hash'         => FieldType::single('string'),
        ];
    }
}
