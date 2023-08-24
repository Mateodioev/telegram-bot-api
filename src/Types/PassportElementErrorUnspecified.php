<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorunspecified
 */
class PassportElementErrorUnspecified extends PassportElementError
{
    protected function boot(): void
    {
        $this->fields = [
            'source'       => FieldType::single('string'),
            'type'         => FieldType::single('string'),
            'element_hash' => FieldType::single('string'),
            'message'      => FieldType::single('string'),
        ];
    }
}
