<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents an inline keyboard button that copies specified text to the clipboard.
 *
 * @property string $text The text to be copied to the clipboard; 1-256 characters
 *
 * @method string text()
 *
 * @method static setText(string $text)
 *
 * @see https://core.telegram.org/bots/api#copytextbutton
 */
class CopyTextButton extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'text' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
