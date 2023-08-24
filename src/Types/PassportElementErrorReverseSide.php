<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an issue with the reverse side of a document. The error is considered resolved when the file with reverse side of the document changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorreverseside
 */
class PassportElementErrorReverseSide extends PassportElementError
{
    protected function boot(): void
    {
        $this->fields = [
            'source'    => FieldType::single('string'),
            'type'      => FieldType::single('string'),
            'file_hash' => FieldType::single('string'),
            'message'   => FieldType::single('string'),
        ];
    }
}
