<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @see https://core.telegram.org/bots/api#audio
 */
class Audio extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'duration'       => FieldType::single('integer'),
            'performer'      => FieldType::optional('string'),
            'title'          => FieldType::optional('string'),
            'file_name'      => FieldType::optional('string'),
            'mime_type'      => FieldType::optional('string'),
            'file_size'      => FieldType::optional('integer'),
            'thumbnail'      => FieldType::optional(PhotoSize::class),
        ];
    }
}
