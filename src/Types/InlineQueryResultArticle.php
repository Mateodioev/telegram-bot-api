<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

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
    }

    public static function default(): static
    {
        return (new static())
            ->setType('article');
    }
}
