<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 *
 * @see https://core.telegram.org/bots/api#videonote
 */
class VideoNote extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'length'         => FieldType::single('integer'),
            'duration'       => FieldType::single('integer'),
            'thumbnail'      => FieldType::optional(PhotoSize::class),
            'file_size'      => FieldType::optional('integer'),
        ];
    }
}
