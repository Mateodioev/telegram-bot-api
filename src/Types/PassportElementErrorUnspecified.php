<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 * 
 * @property string $source       Error source, must be unspecified
 * @property string $type         Type of element of the user's Telegram Passport which has the issue
 * @property string $element_hash Base64-encoded element hash
 * @property string $message      Error message
 * 
 * @method string source()
 * @method string type()
 * @method string elementHash()
 * @method string message()
 * 
 * @method static setSource(string $source)
 * @method static setType(string $type)
 * @method static setElementHash(string $elementHash)
 * @method static setMessage(string $message)
 * 
 * @see https://core.telegram.org/bots/api#passportelementerrorunspecified
 */
class PassportElementErrorUnspecified extends baseType
{
    protected array $fields = [
        'source'       => 'string',
        'type'         => 'string',
        'element_hash' => 'string',
        'message'      => 'string',
    ];
}
