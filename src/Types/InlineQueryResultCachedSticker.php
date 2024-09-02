<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a link to a sticker stored on the Telegram servers. By default, this sticker will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the sticker.
 *
 * @property string $type Type of the result, must be sticker
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $sticker_file_id A valid file identifier of the sticker
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the sticker
 *
 * @method string type()
 * @method string id()
 * @method string stickerFileId()
 * @method InlineKeyboardMarkup|null replyMarkup()
 * @method InputMessageContent|null inputMessageContent()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setStickerFileId(string $stickerFileId)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setInputMessageContent(InputMessageContent|null $inputMessageContent)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedsticker
 */
class InlineQueryResultCachedSticker extends InlineQueryResult
{
    public const TYPE = 'sticker';

    public function __construct(
        string $id,
        string $sticker_file_id,
        string $type = self::TYPE,
        ?InlineKeyboardMarkup $reply_markup = null,
        ?InputMessageContent $input_message_content = null,
    ) {
        parent::__construct([
            'type'                  => $type,
            'id'                    => $id,
            'sticker_file_id'       => $sticker_file_id,
            'reply_markup'          => $reply_markup,
            'input_message_content' => $input_message_content,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'sticker_file_id'       => FieldType::single('string'),
            'reply_markup'          => FieldType::optional(InlineKeyboardMarkup::class),
            'input_message_content' => FieldType::optional(InputMessageContent::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
