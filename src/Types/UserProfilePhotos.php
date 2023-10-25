<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represent a user's profile pictures.
 *
 * @property int $total_count Total number of profile pictures the target user has
 * @property PhotoSize[] $photos Requested profile pictures (in up to 4 sizes each)
 *
 * @method int totalCount()
 * @method PhotoSize[] photos()
 *
 * @method static setTotalCount(int $totalCount)
 * @method static setPhotos(PhotoSize[] $photos)
 *
 * @see https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotos extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'total_count' => FieldType::single('integer'),
            'photos'      => FieldType::multiple(PhotoSize::class),
        ];
    }
}
