<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an issue with the translated version of a document. The error is considered resolved when a file with the document translation change.
 *
 * @property string $source Error source, must be translation_files
 * @property string $type Type of element of the user's Telegram Passport which has the issue, one of "passport", "driver_license", "identity_card", "internal_passport", "utility_bill", "bank_statement", "rental_agreement", "passport_registration", "temporary_registration"
 * @property string[] $file_hashes List of base64-encoded file hashes
 * @property string $message Error message
 *
 * @method string source()
 * @method string type()
 * @method string[] fileHashes()
 * @method string message()
 *
 * @method static setSource(string $source)
 * @method static setType(string $type)
 * @method static setFileHashes(string[] $fileHashes)
 * @method static setMessage(string $message)
 *
 * @see https://core.telegram.org/bots/api#passportelementerrortranslationfiles
 */
class PassportElementErrorTranslationFiles extends PassportElementError
{
    protected function boot(): void
    {
        $this->fields = [
            'source'      => FieldType::single('string'),
            'type'        => FieldType::single('string'),
            'file_hashes' => FieldType::multiple('string'),
            'message'     => FieldType::single('string'),
        ];
    }
}
