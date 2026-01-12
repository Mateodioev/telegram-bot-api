<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes the rating of a user based on their Telegram Star spendings.
 *
 * @property int $level Current level of the user, indicating their reliability when purchasing digital goods and services. A higher level suggests a more trustworthy customer; a negative level is likely reason for concern.
 * @property int $rating Numerical value of the user's rating; the higher the rating, the better
 * @property int $current_level_rating The rating value required to get the current level
 * @property int|null $next_level_rating Optional. The rating value required to get to the next level; omitted if the maximum level was reached
 *
 * @method int level()
 * @method int rating()
 * @method int currentLevelRating()
 * @method int|null nextLevelRating()
 *
 * @method static setLevel(int $level)
 * @method static setRating(int $rating)
 * @method static setCurrentLevelRating(int $currentLevelRating)
 * @method static setNextLevelRating(int|null $nextLevelRating)
 *
 * @see https://core.telegram.org/bots/api#userrating
 */
class UserRating extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'level'                => FieldType::single('integer'),
            'rating'               => FieldType::single('integer'),
            'current_level_rating' => FieldType::single('integer'),
            'next_level_rating'    => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
