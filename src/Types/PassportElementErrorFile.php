<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 *
 * @property string $source Error source, must be file
 * @property string $type The section of the user's Telegram Passport which has the issue, one of "utility_bill", "bank_statement", "rental_agreement", "passport_registration", "temporary_registration"
 * @property string $file_hash Base64-encoded file hash
 * @property string $message Error message
 *
 * @method string source()
 * @method string type()
 * @method string fileHash()
 * @method string message()
 *
 * @method static setSource(string $source)
 * @method static setType(string $type)
 * @method static setFileHash(string $fileHash)
 * @method static setMessage(string $message)
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfile
 */
class PassportElementErrorFile extends PassportElementError
{
    public const SOURCE = 'file';
    public function __construct(
        string $type,
        string $file_hash,
        string $message,
        string $source = self::SOURCE,
    ) {
        parent::__construct([
            'source'    => $source,
            'type'      => $type,
            'file_hash' => $file_hash,
            'message'   => $message,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'source'    => FieldType::single('string'),
            'type'      => FieldType::single('string'),
            'file_hash' => FieldType::single('string'),
            'message'   => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
