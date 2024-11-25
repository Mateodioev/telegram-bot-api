<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes an inline message to be sent by a user of a Mini App.
 *
 * @property string $id Unique identifier of the prepared message
 * @property int $expiration_date Expiration date of the prepared message, in Unix time. Expired prepared messages can no longer be used
 *
 * @method string id()
 * @method int expirationDate()
 *
 * @method static setId(string $id)
 * @method static setExpirationDate(int $expirationDate)
 *
 * @see https://core.telegram.org/bots/api#preparedinlinemessage
 */
class PreparedInlineMessage extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'              => FieldType::single('string'),
            'expiration_date' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
