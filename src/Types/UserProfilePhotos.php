<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represent a user's profile pictures.
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
