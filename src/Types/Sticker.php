<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a sticker.
 *
 * @see https://core.telegram.org/bots/api#sticker
 */
class Sticker extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'           => FieldType::single('string'),
            'file_unique_id'    => FieldType::single('string'),
            'type'              => FieldType::single('string'),
            'width'             => FieldType::single('integer'),
            'height'            => FieldType::single('integer'),
            'is_animated'       => FieldType::single('boolean'),
            'is_video'          => FieldType::single('boolean'),
            'thumbnail'         => FieldType::optional(PhotoSize::class),
            'emoji'             => FieldType::optional('string'),
            'set_name'          => FieldType::optional('string'),
            'premium_animation' => FieldType::optional(File::class),
            'mask_position'     => FieldType::optional(MaskPosition::class),
            'custom_emoji_id'   => FieldType::optional('string'),
            'needs_repainting'  => FieldType::optional('boolean'),
            'file_size'         => FieldType::optional('integer'),
        ];
    }
}
