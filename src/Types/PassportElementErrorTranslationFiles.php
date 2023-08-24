<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an issue with the translated version of a document. The error is considered resolved when a file with the document translation change.
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
