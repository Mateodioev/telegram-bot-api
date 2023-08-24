<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
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
