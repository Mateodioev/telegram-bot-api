<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The paid media is a live photo.
 *
 * @property string $type Type of the paid media, always "live_photo"
 * @property LivePhoto $live_photo The photo
 *
 * @method string type()
 * @method LivePhoto livePhoto()
 *
 * @method static setType(string $type)
 * @method static setLivePhoto(LivePhoto $livePhoto)
 *
 * @see https://core.telegram.org/bots/api#paidmedialivephoto
 */
class PaidMediaLivePhoto extends PaidMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'       => FieldType::single('string'),
            'live_photo' => FieldType::single(LivePhoto::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('live_photo');
    }
}
