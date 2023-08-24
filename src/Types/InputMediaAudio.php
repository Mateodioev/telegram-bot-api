<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an audio file to be treated as music to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediaaudio
 */
class InputMediaAudio extends InputMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'             => FieldType::single('string'),
            'media'            => FieldType::single('string'),
            'thumbnail'        => FieldType::mixed(),
            'caption'          => FieldType::optional('string'),
            'parse_mode'       => FieldType::optional('string'),
            'caption_entities' => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'duration'         => FieldType::optional('integer'),
            'performer'        => FieldType::optional('string'),
            'title'            => FieldType::optional('string'),
        ];
    }
}
