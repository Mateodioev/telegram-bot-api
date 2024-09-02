<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes an interval of time during which a business is open.
 *
 * @property int $opening_minute The minute's sequence number in a week, starting on Monday, marking the start of the time interval during which the business is open; 0 - 7 * 24 * 60
 * @property int $closing_minute The minute's sequence number in a week, starting on Monday, marking the end of the time interval during which the business is open; 0 - 8 * 24 * 60
 *
 * @method int openingMinute()
 * @method int closingMinute()
 *
 * @method static setOpeningMinute(int $openingMinute)
 * @method static setClosingMinute(int $closingMinute)
 *
 * @see https://core.telegram.org/bots/api#businessopeninghoursinterval
 */
class BusinessOpeningHoursInterval extends abstractType
{
    public function __construct(
        int $opening_minute,
        int $closing_minute,
    ) {
        parent::__construct([
            'opening_minute' => $opening_minute,
            'closing_minute' => $closing_minute,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'opening_minute' => FieldType::single('integer'),
            'closing_minute' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
