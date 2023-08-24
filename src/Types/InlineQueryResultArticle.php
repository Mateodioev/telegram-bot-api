<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to an article or web page.
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
}
