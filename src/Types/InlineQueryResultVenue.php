<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the venue.
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @property string $type Type of the result, must be venue
 * @property string $id Unique identifier for this result, 1-64 Bytes
 * @property double $latitude Latitude of the venue location in degrees
 * @property double $longitude Longitude of the venue location in degrees
 * @property string $title Title of the venue
 * @property string $address Address of the venue
 * @property ?string $foursquare_id Optional. Foursquare identifier of the venue if known
 * @property ?string $foursquare_type Optional. Foursquare type of the venue, if known. (For example, "arts_entertainment/default", "arts_entertainment/aquarium" or "food/icecream".)
 * @property ?string $google_place_id Optional. Google Places identifier of the venue
 * @property ?string $google_place_type Optional. Google Places type of the venue. (See supported types.)
 * @property ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the venue
 * @property ?string $thumbnail_url Optional. Url of the thumbnail for the result
 * @property ?int $thumbnail_width Optional. Thumbnail width
 * @property ?int $thumbnail_height Optional. Thumbnail height
 *
 * @method string type()
 * @method string id()
 * @method double latitude()
 * @method double longitude()
 * @method string title()
 * @method string address()
 * @method ?string foursquareId()
 * @method ?string foursquareType()
 * @method ?string googlePlaceId()
 * @method ?string googlePlaceType()
 * @method ?InlineKeyboardMarkup replyMarkup()
 * @method ?InputMessageContent inputMessageContent()
 * @method ?string thumbnailUrl()
 * @method ?int thumbnailWidth()
 * @method ?int thumbnailHeight()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setLatitude(double $latitude)
 * @method static setLongitude(double $longitude)
 * @method static setTitle(string $title)
 * @method static setAddress(string $address)
 * @method static setFoursquareId(?string $foursquareId)
 * @method static setFoursquareType(?string $foursquareType)
 * @method static setGooglePlaceId(?string $googlePlaceId)
 * @method static setGooglePlaceType(?string $googlePlaceType)
 * @method static setReplyMarkup(?InlineKeyboardMarkup $replyMarkup)
 * @method static setInputMessageContent(?InputMessageContent $inputMessageContent)
 * @method static setThumbnailUrl(?string $thumbnailUrl)
 * @method static setThumbnailWidth(?int $thumbnailWidth)
 * @method static setThumbnailHeight(?int $thumbnailHeight)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvenue
 */
class InlineQueryResultVenue extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'latitude'              => FieldType::single('double'),
            'longitude'             => FieldType::single('double'),
            'title'                 => FieldType::single('string'),
            'address'               => FieldType::single('string'),
            'foursquare_id'         => FieldType::optional('string'),
            'foursquare_type'       => FieldType::optional('string'),
            'google_place_id'       => FieldType::optional('string'),
            'google_place_type'     => FieldType::optional('string'),
            'reply_markup'          => FieldType::optional(InlineKeyboardMarkup::class),
            'input_message_content' => FieldType::optional(InputMessageContent::class),
            'thumbnail_url'         => FieldType::optional('string'),
            'thumbnail_width'       => FieldType::optional('integer'),
            'thumbnail_height'      => FieldType::optional('integer'),
        ];
    }
}
