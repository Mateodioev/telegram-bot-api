<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The paid media isn't available before the payment.
 *
 * @property string $type Type of the paid media, always "preview"
 * @property int|null $width Optional. Media width as defined by the sender
 * @property int|null $height Optional. Media height as defined by the sender
 * @property int|null $duration Optional. Duration of the media in seconds as defined by the sender
 *
 * @method string type()
 * @method int|null width()
 * @method int|null height()
 * @method int|null duration()
 *
 * @method static setType(string $type)
 * @method static setWidth(int|null $width)
 * @method static setHeight(int|null $height)
 * @method static setDuration(int|null $duration)
 *
 * @see https://core.telegram.org/bots/api#paidmediapreview
 */
class PaidMediaPreview extends PaidMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'     => FieldType::single('string'),
            'width'    => FieldType::optional('integer'),
            'height'   => FieldType::optional('integer'),
            'duration' => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())->setType('preview');
    }
}
