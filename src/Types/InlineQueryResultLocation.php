<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @property string $type Type of the result, must be location
 * @property string $id Unique identifier for this result, 1-64 Bytes
 * @property double $latitude Location latitude in degrees
 * @property double $longitude Location longitude in degrees
 * @property string $title Location title
 * @property ?double $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property ?int $live_period Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
 * @property ?int $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property ?int $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * @property ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the location
 * @property ?string $thumbnail_url Optional. Url of the thumbnail for the result
 * @property ?int $thumbnail_width Optional. Thumbnail width
 * @property ?int $thumbnail_height Optional. Thumbnail height
 *
 * @method string type()
 * @method string id()
 * @method double latitude()
 * @method double longitude()
 * @method string title()
 * @method ?double horizontalAccuracy()
 * @method ?int livePeriod()
 * @method ?int heading()
 * @method ?int proximityAlertRadius()
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
 * @method static setHorizontalAccuracy(?double $horizontalAccuracy)
 * @method static setLivePeriod(?int $livePeriod)
 * @method static setHeading(?int $heading)
 * @method static setProximityAlertRadius(?int $proximityAlertRadius)
 * @method static setReplyMarkup(?InlineKeyboardMarkup $replyMarkup)
 * @method static setInputMessageContent(?InputMessageContent $inputMessageContent)
 * @method static setThumbnailUrl(?string $thumbnailUrl)
 * @method static setThumbnailWidth(?int $thumbnailWidth)
 * @method static setThumbnailHeight(?int $thumbnailHeight)
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
