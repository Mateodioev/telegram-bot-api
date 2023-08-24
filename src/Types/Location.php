<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a point on the map.
 *
 * @see https://core.telegram.org/bots/api#location
 */
class Location extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'longitude'              => FieldType::single('double'),
            'latitude'               => FieldType::single('double'),
            'horizontal_accuracy'    => FieldType::optional('double'),
            'live_period'            => FieldType::optional('integer'),
            'heading'                => FieldType::optional('integer'),
            'proximity_alert_radius' => FieldType::optional('integer'),
        ];
    }
}
