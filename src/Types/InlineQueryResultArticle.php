<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a link to an article or web page.
 *
 * @property string $type Type of the result, must be article
 * @property string $id Unique identifier for this result, 1-64 Bytes
 * @property string $title Title of the result
 * @property InputMessageContent $input_message_content Content of the message to be sent
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property string|null $url Optional. URL of the result
 * @property bool|null $hide_url Optional. Pass True if you don't want the URL to be shown in the message
 * @property string|null $description Optional. Short description of the result
 * @property string|null $thumbnail_url Optional. Url of the thumbnail for the result
 * @property int|null $thumbnail_width Optional. Thumbnail width
 * @property int|null $thumbnail_height Optional. Thumbnail height
 *
 * @method string type()
 * @method string id()
 * @method string title()
 * @method InputMessageContent inputMessageContent()
 * @method InlineKeyboardMarkup|null replyMarkup()
 * @method string|null url()
 * @method bool|null hideUrl()
 * @method string|null description()
 * @method string|null thumbnailUrl()
 * @method int|null thumbnailWidth()
 * @method int|null thumbnailHeight()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setTitle(string $title)
 * @method static setInputMessageContent(InputMessageContent $inputMessageContent)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setUrl(string|null $url)
 * @method static setHideUrl(bool|null $hideUrl)
 * @method static setDescription(string|null $description)
 * @method static setThumbnailUrl(string|null $thumbnailUrl)
 * @method static setThumbnailWidth(int|null $thumbnailWidth)
 * @method static setThumbnailHeight(int|null $thumbnailHeight)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultarticle
 */
class InlineQueryResultArticle extends InlineQueryResult
{
    public const TYPE = 'article';

    public function __construct(
        string $id,
        string $title,
        InputMessageContent $input_message_content,
        string $type = self::TYPE,
        ?InlineKeyboardMarkup $reply_markup = null,
        ?string $url = null,
        ?bool $hide_url = null,
        ?string $description = null,
        ?string $thumbnail_url = null,
        ?int $thumbnail_width = null,
        ?int $thumbnail_height = null,
    ) {
        parent::__construct([
            'type'                  => $type,
            'id'                    => $id,
            'title'                 => $title,
            'input_message_content' => $input_message_content,
            'reply_markup'          => $reply_markup,
            'url'                   => $url,
            'hide_url'              => $hide_url,
            'description'           => $description,
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
            'input_message_content' => FieldType::single(InputMessageContent::class),
            'reply_markup'          => FieldType::optional(InlineKeyboardMarkup::class),
            'url'                   => FieldType::optional('string'),
            'hide_url'              => FieldType::optional('boolean'),
            'description'           => FieldType::optional('string'),
            'thumbnail_url'         => FieldType::optional('string'),
            'thumbnail_width'       => FieldType::optional('integer'),
            'thumbnail_height'      => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
