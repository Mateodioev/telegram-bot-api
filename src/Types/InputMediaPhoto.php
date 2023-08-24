<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a photo to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhoto extends InputMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'             => FieldType::single('string'),
            'media'            => FieldType::single('string'),
            'caption'          => FieldType::optional('string'),
            'parse_mode'       => FieldType::optional('string'),
            'caption_entities' => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'has_spoiler'      => FieldType::optional('boolean'),
        ];
    }
}
