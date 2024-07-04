<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * The paid media is a video.
 *
 * @property string $type Type of the paid media, always "video"
 * @property Video $video The video
 *
 * @method string type()
 * @method Video video()
 *
 * @method static setType(string $type)
 * @method static setVideo(Video $video)
 *
 * @see https://core.telegram.org/bots/api#paidmediavideo
 */
class PaidMediaVideo extends PaidMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'  => FieldType::single('string'),
            'video' => FieldType::single(Video::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static)->setType('video');
    }
}
