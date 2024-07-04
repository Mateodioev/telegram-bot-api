<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * Describes the paid media added to a message.
 *
 * @property int $star_count The number of Telegram Stars that must be paid to buy access to the media
 * @property PaidMedia[] $paid_media Information about the paid media
 *
 * @method int starCount()
 * @method PaidMedia[] paidMedia()
 *
 * @method static setStarCount(int $starCount)
 * @method static setPaidMedia(PaidMedia[] $paidMedia)
 *
 * @see https://core.telegram.org/bots/api#paidmediainfo
 */
class PaidMediaInfo extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'star_count' => FieldType::single('integer'),
            'paid_media' => FieldType::multiple(PaidMedia::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
