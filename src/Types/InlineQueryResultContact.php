<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the contact.
 *
 * @property string $type Type of the result, must be contact
 * @property string $id Unique identifier for this result, 1-64 Bytes
 * @property string $phone_number Contact's phone number
 * @property string $first_name Contact's first name
 * @property string|null $last_name Optional. Contact's last name
 * @property string|null $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the contact
 * @property string|null $thumbnail_url Optional. Url of the thumbnail for the result
 * @property int|null $thumbnail_width Optional. Thumbnail width
 * @property int|null $thumbnail_height Optional. Thumbnail height
 *
 * @method string type()
 * @method string id()
 * @method string phoneNumber()
 * @method string firstName()
 * @method string|null lastName()
 * @method string|null vcard()
 * @method InlineKeyboardMarkup|null replyMarkup()
 * @method InputMessageContent|null inputMessageContent()
 * @method string|null thumbnailUrl()
 * @method int|null thumbnailWidth()
 * @method int|null thumbnailHeight()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setPhoneNumber(string $phoneNumber)
 * @method static setFirstName(string $firstName)
 * @method static setLastName(string|null $lastName)
 * @method static setVcard(string|null $vcard)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setInputMessageContent(InputMessageContent|null $inputMessageContent)
 * @method static setThumbnailUrl(string|null $thumbnailUrl)
 * @method static setThumbnailWidth(int|null $thumbnailWidth)
 * @method static setThumbnailHeight(int|null $thumbnailHeight)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcontact
 */
class InlineQueryResultContact extends InlineQueryResult
{
    public const TYPE = 'contact';

    public function __construct(
        string $id,
        string $phone_number,
        string $first_name,
        string $type = self::TYPE,
        ?string $last_name = null,
        ?string $vcard = null,
        ?InlineKeyboardMarkup $reply_markup = null,
        ?InputMessageContent $input_message_content = null,
        ?string $thumbnail_url = null,
        ?int $thumbnail_width = null,
        ?int $thumbnail_height = null,
    ) {
        parent::__construct([
            'type'                  => $type,
            'id'                    => $id,
            'phone_number'          => $phone_number,
            'first_name'            => $first_name,
            'last_name'             => $last_name,
            'vcard'                 => $vcard,
            'reply_markup'          => $reply_markup,
            'input_message_content' => $input_message_content,
            'thumbnail_url'         => $thumbnail_url,
            'thumbnail_width'       => $thumbnail_width,
            'thumbnail_height'      => $thumbnail_height,
        ]);
    }

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
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
