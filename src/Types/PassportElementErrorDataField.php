<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the field's value changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrordatafield
 */
class PassportElementErrorDataField extends PassportElementError
{
    protected function boot(): void
    {
        $this->fields = [
            'source'     => FieldType::single('string'),
            'type'       => FieldType::single('string'),
            'field_name' => FieldType::single('string'),
            'data_hash'  => FieldType::single('string'),
            'message'    => FieldType::single('string'),
        ];
    }
}
