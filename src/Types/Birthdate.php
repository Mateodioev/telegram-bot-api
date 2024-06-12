<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes the birthdate of a user.
 *
 * @property int $day Day of the user's birth; 1-31
 * @property int $month Month of the user's birth; 1-12
 * @property int|null $year Optional. Year of the user's birth
 *
 * @method int day()
 * @method int month()
 * @method int|null year()
 *
 * @method static setDay(int $day)
 * @method static setMonth(int $month)
 * @method static setYear(int|null $year)
 *
 * @see https://core.telegram.org/bots/api#birthdate
 */
class Birthdate extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'day'   => FieldType::single('integer'),
            'month' => FieldType::single('integer'),
            'year'  => FieldType::optional('integer'),
        ];
    }
}
