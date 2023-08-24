<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a video file.
 *
 * @see https://core.telegram.org/bots/api#video
 */
class Video extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'width'          => FieldType::single('integer'),
            'height'         => FieldType::single('integer'),
            'duration'       => FieldType::single('integer'),
            'thumbnail'      => FieldType::optional(PhotoSize::class),
            'file_name'      => FieldType::optional('string'),
            'mime_type'      => FieldType::optional('string'),
            'file_size'      => FieldType::optional('integer'),
        ];
    }
}
