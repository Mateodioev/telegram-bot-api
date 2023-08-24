<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the field's value changes.
 *
 * @property string $source Error source, must be data
 * @property string $type The section of the user's Telegram Passport which has the error, one of "personal_details", "passport", "driver_license", "identity_card", "internal_passport", "address"
 * @property string $field_name Name of the data field which has the error
 * @property string $data_hash Base64-encoded data hash
 * @property string $message Error message
 *
 * @method string source()
 * @method string type()
 * @method string fieldName()
 * @method string dataHash()
 * @method string message()
 *
 * @method static setSource(string $source)
 * @method static setType(string $type)
 * @method static setFieldName(string $fieldName)
 * @method static setDataHash(string $dataHash)
 * @method static setMessage(string $message)
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
