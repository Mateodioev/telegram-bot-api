<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a keyboard button to be used by a user of a Mini App.
 *
 * @property string $id Unique identifier of the keyboard button
 *
 * @method string id()
 *
 * @method static setId(string $id)
 *
 * @see https://core.telegram.org/bots/api#preparedkeyboardbutton
 */
class PreparedKeyboardButton extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
