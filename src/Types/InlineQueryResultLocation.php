<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultlocation
 */
class InlineQueryResultLocation extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                   => FieldType::single('string'),
            'id'                     => FieldType::single('string'),
            'latitude'               => FieldType::single('double'),
            'longitude'              => FieldType::single('double'),
            'title'                  => FieldType::single('string'),
            'horizontal_accuracy'    => FieldType::optional('double'),
            'live_period'            => FieldType::optional('integer'),
            'heading'                => FieldType::optional('integer'),
            'proximity_alert_radius' => FieldType::optional('integer'),
            'reply_markup'           => FieldType::optional(InlineKeyboardMarkup::class),
            'input_message_content'  => FieldType::optional(InputMessageContent::class),
            'thumbnail_url'          => FieldType::optional('string'),
            'thumbnail_width'        => FieldType::optional('integer'),
            'thumbnail_height'       => FieldType::optional('integer'),
        ];
    }
}
