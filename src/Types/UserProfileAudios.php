<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents the audios displayed on a user's profile.
 *
 * @property int $total_count Total number of profile audios for the target user
 * @property Audio[] $audios Requested profile audios
 *
 * @method int totalCount()
 * @method Audio[] audios()
 *
 * @method static setTotalCount(int $totalCount)
 * @method static setAudios(Audio[] $audios)
 *
 * @see https://core.telegram.org/bots/api#userprofileaudios
 */
class UserProfileAudios extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'total_count' => FieldType::single('integer'),
            'audios'      => FieldType::array(Audio::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
