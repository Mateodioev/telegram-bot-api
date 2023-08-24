<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of a location message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
class InputLocationMessageContent extends InputMessageContent
{
    protected function boot(): void
    {
        $this->fields = [
            'latitude'               => FieldType::single('double'),
            'longitude'              => FieldType::single('double'),
            'horizontal_accuracy'    => FieldType::optional('double'),
            'live_period'            => FieldType::optional('integer'),
            'heading'                => FieldType::optional('integer'),
            'proximity_alert_radius' => FieldType::optional('integer'),
        ];
    }
}
