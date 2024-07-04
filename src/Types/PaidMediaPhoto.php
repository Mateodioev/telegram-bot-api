<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * The paid media is a photo.
 *
 * @property string $type Type of the paid media, always "photo"
 * @property PhotoSize[] $photo The photo
 *
 * @method string type()
 * @method PhotoSize[] photo()
 *
 * @method static setType(string $type)
 * @method static setPhoto(PhotoSize[] $photo)
 *
 * @see https://core.telegram.org/bots/api#paidmediaphoto
 */
class PaidMediaPhoto extends PaidMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'  => FieldType::single('string'),
            'photo' => FieldType::multiple(PhotoSize::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static)->setType('photo');
    }
}
