<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an animation file (GIF or H.264/MPEG-4 AVC video without sound) to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediaanimation
 */
class InputMediaAnimation extends InputMedia
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
            'width'            => FieldType::optional('integer'),
            'height'           => FieldType::optional('integer'),
            'duration'         => FieldType::optional('integer'),
            'has_spoiler'      => FieldType::optional('boolean'),
        ];
    }
}
