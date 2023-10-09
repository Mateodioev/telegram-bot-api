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
 * @property string|null $foursquare_id Optional. Foursquare identifier of the venue if known
 * @property string|null $foursquare_type Optional. Foursquare type of the venue, if known. (For example, "arts_entertainment/default", "arts_entertainment/aquarium" or "food/icecream".)
 * @property string|null $google_place_id Optional. Google Places identifier of the venue
 * @property string|null $google_place_type Optional. Google Places type of the venue. (See supported types.)
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the venue
 * @property string|null $thumbnail_url Optional. Url of the thumbnail for the result
 * @property int|null $thumbnail_width Optional. Thumbnail width
 * @property int|null $thumbnail_height Optional. Thumbnail height
 *
 * @method string type()
 * @method string id()
 * @method double latitude()
 * @method double longitude()
 * @method string title()
 * @method string address()
 * @method string|null foursquareId()
 * @method string|null foursquareType()
 * @method string|null googlePlaceId()
 * @method string|null googlePlaceType()
 * @method InlineKeyboardMarkup|null replyMarkup()
 * @method InputMessageContent|null inputMessageContent()
 * @method string|null thumbnailUrl()
 * @method int|null thumbnailWidth()
 * @method int|null thumbnailHeight()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setLatitude(double $latitude)
 * @method static setLongitude(double $longitude)
 * @method static setTitle(string $title)
 * @method static setAddress(string $address)
 * @method static setFoursquareId(string|null $foursquareId)
 * @method static setFoursquareType(string|null $foursquareType)
 * @method static setGooglePlaceId(string|null $googlePlaceId)
 * @method static setGooglePlaceType(string|null $googlePlaceType)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setInputMessageContent(InputMessageContent|null $inputMessageContent)
 * @method static setThumbnailUrl(string|null $thumbnailUrl)
 * @method static setThumbnailWidth(int|null $thumbnailWidth)
 * @method static setThumbnailHeight(int|null $thumbnailHeight)
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

    public static function default(): static
    {
        return (new static())
            ->setType('venue');
    }
}
