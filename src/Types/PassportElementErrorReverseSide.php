<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents an issue with the reverse side of a document. The error is considered resolved when the file with reverse side of the document changes.
 *
 * @property string $source Error source, must be reverse_side
 * @property string $type The section of the user's Telegram Passport which has the issue, one of "driver_license", "identity_card"
 * @property string $file_hash Base64-encoded hash of the file with the reverse side of the document
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
 * @see https://core.telegram.org/bots/api#passportelementerrorreverseside
 */
class PassportElementErrorReverseSide extends PassportElementError
{
    public const SOURCE = 'reverse_side';

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
