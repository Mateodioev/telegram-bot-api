<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the scans changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfiles
 */
class PassportElementErrorFiles extends PassportElementError
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
