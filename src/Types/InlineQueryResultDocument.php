<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file. Currently, only .PDF and .ZIP files can be sent using this method.
 *
 * @property string $type Type of the result, must be document
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $title Title for the result
 * @property string|null $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the document caption. See formatting options for more details.
 * @property MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property string $document_url A valid URL for the file
 * @property string $mime_type MIME type of the content of the file, either "application/pdf" or "application/zip"
 * @property string|null $description Optional. Short description of the result
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the file
 * @property string|null $thumbnail_url Optional. URL of the thumbnail (JPEG only) for the file
 * @property int|null $thumbnail_width Optional. Thumbnail width
 * @property int|null $thumbnail_height Optional. Thumbnail height
 *
 * @method string type()
 * @method string id()
 * @method string title()
 * @method string|null caption()
 * @method string|null parseMode()
 * @method MessageEntity[]|null captionEntities()
 * @method string documentUrl()
 * @method string mimeType()
 * @method string|null description()
 * @method InlineKeyboardMarkup|null replyMarkup()
 * @method InputMessageContent|null inputMessageContent()
 * @method string|null thumbnailUrl()
 * @method int|null thumbnailWidth()
 * @method int|null thumbnailHeight()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setTitle(string $title)
 * @method static setCaption(string|null $caption)
 * @method static setParseMode(string|null $parseMode)
 * @method static setCaptionEntities(MessageEntity[]|null $captionEntities)
 * @method static setDocumentUrl(string $documentUrl)
 * @method static setMimeType(string $mimeType)
 * @method static setDescription(string|null $description)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setInputMessageContent(InputMessageContent|null $inputMessageContent)
 * @method static setThumbnailUrl(string|null $thumbnailUrl)
 * @method static setThumbnailWidth(int|null $thumbnailWidth)
 * @method static setThumbnailHeight(int|null $thumbnailHeight)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultdocument
 */
class InlineQueryResultDocument extends InlineQueryResult
{
    public const TYPE = 'document';

    public function __construct(
        string $id,
        string $title,
        string $type = self::TYPE,
        ?string $caption = null,
        ?string $parse_mode = null,
        ?array $caption_entities = null,
        string $document_url,
        string $mime_type,
        ?string $description = null,
        ?InlineKeyboardMarkup $reply_markup = null,
        ?InputMessageContent $input_message_content = null,
        ?string $thumbnail_url = null,
        ?int $thumbnail_width = null,
        ?int $thumbnail_height = null,
    ) {
        parent::__construct([
            'type'                  => $type,
            'id'                    => $id,
            'title'                 => $title,
            'caption'               => $caption,
            'parse_mode'            => $parse_mode,
            'caption_entities'      => $caption_entities,
            'document_url'          => $document_url,
            'mime_type'             => $mime_type,
            'description'           => $description,
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
            'title'                 => FieldType::single('string'),
            'caption'               => FieldType::optional('string'),
            'parse_mode'            => FieldType::optional('string'),
            'caption_entities'      => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'document_url'          => FieldType::single('string'),
            'mime_type'             => FieldType::single('string'),
            'description'           => FieldType::optional('string'),
            'reply_markup'          => FieldType::optional(InlineKeyboardMarkup::class),
            'input_message_content' => FieldType::optional(InputMessageContent::class),
            'thumbnail_url'         => FieldType::optional('string'),
            'thumbnail_width'       => FieldType::optional('integer'),
            'thumbnail_height'      => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
