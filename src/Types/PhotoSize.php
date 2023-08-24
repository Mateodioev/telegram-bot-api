<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 * @see https://core.telegram.org/bots/api#photosize
 */
class PhotoSize extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'width'          => FieldType::single('integer'),
            'height'         => FieldType::single('integer'),
            'file_size'      => FieldType::optional('integer'),
        ];
    }
}
