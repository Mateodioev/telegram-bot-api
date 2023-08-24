<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of a venue message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputvenuemessagecontent
 */
class InputVenueMessageContent extends InputMessageContent
{
    protected function boot(): void
    {
        $this->fields = [
            'latitude'          => FieldType::single('double'),
            'longitude'         => FieldType::single('double'),
            'title'             => FieldType::single('string'),
            'address'           => FieldType::single('string'),
            'foursquare_id'     => FieldType::optional('string'),
            'foursquare_type'   => FieldType::optional('string'),
            'google_place_id'   => FieldType::optional('string'),
            'google_place_type' => FieldType::optional('string'),
        ];
    }
}
