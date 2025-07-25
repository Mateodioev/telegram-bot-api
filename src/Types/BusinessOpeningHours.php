<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes the opening hours of a business.
 *
 * @property string $time_zone_name Unique name of the time zone for which the opening hours are defined
 * @property BusinessOpeningHoursInterval[] $opening_hours List of time intervals describing business opening hours
 *
 * @method string timeZoneName()
 * @method BusinessOpeningHoursInterval[] openingHours()
 *
 * @method static setTimeZoneName(string $timeZoneName)
 * @method static setOpeningHours(BusinessOpeningHoursInterval[] $openingHours)
 *
 * @see https://core.telegram.org/bots/api#businessopeninghours
 */
class BusinessOpeningHours extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'time_zone_name' => FieldType::single('string'),
            'opening_hours'  => FieldType::array(BusinessOpeningHoursInterval::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
