<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the contact.
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @property string $type Type of the result, must be contact
 * @property string $id Unique identifier for this result, 1-64 Bytes
 * @property string $phone_number Contact's phone number
 * @property string $first_name Contact's first name
 * @property ?string $last_name Optional. Contact's last name
 * @property ?string $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
 * @property ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the contact
 * @property ?string $thumbnail_url Optional. Url of the thumbnail for the result
 * @property ?int $thumbnail_width Optional. Thumbnail width
 * @property ?int $thumbnail_height Optional. Thumbnail height
 *
 * @method string type()
 * @method string id()
 * @method string phoneNumber()
 * @method string firstName()
 * @method ?string lastName()
 * @method ?string vcard()
 * @method ?InlineKeyboardMarkup replyMarkup()
 * @method ?InputMessageContent inputMessageContent()
 * @method ?string thumbnailUrl()
 * @method ?int thumbnailWidth()
 * @method ?int thumbnailHeight()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setPhoneNumber(string $phoneNumber)
 * @method static setFirstName(string $firstName)
 * @method static setLastName(?string $lastName)
 * @method static setVcard(?string $vcard)
 * @method static setReplyMarkup(?InlineKeyboardMarkup $replyMarkup)
 * @method static setInputMessageContent(?InputMessageContent $inputMessageContent)
 * @method static setThumbnailUrl(?string $thumbnailUrl)
 * @method static setThumbnailWidth(?int $thumbnailWidth)
 * @method static setThumbnailHeight(?int $thumbnailHeight)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcontact
 */
class InlineQueryResultContact extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'phone_number'          => FieldType::single('string'),
            'first_name'            => FieldType::single('string'),
            'last_name'             => FieldType::optional('string'),
            'vcard'                 => FieldType::optional('string'),
            'reply_markup'          => FieldType::optional(InlineKeyboardMarkup::class),
            'input_message_content' => FieldType::optional(InputMessageContent::class),
            'thumbnail_url'         => FieldType::optional('string'),
            'thumbnail_width'       => FieldType::optional('integer'),
            'thumbnail_height'      => FieldType::optional('integer'),
        ];
    }
}
