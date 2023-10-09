<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
 *
 * @property string $message_text Text of the message to be sent, 1-4096 characters
 * @property string|null $parse_mode Optional. Mode for parsing entities in the message text. See formatting options for more details.
 * @property MessageEntity[]|null $entities Optional. List of special entities that appear in message text, which can be specified instead of parse_mode
 * @property bool|null $disable_web_page_preview Optional. Disables link previews for links in the sent message
 *
 * @method string messageText()
 * @method string|null parseMode()
 * @method MessageEntity[]|null entities()
 * @method bool|null disableWebPagePreview()
 *
 * @method static setMessageText(string $messageText)
 * @method static setParseMode(string|null $parseMode)
 * @method static setEntities(MessageEntity[]|null $entities)
 * @method static setDisableWebPagePreview(bool|null $disableWebPagePreview)
 *
 * @see https://core.telegram.org/bots/api#inputtextmessagecontent
 */
class InputTextMessageContent extends InputMessageContent
{
    protected function boot(): void
    {
        $this->fields = [
            'message_text'             => FieldType::single('string'),
            'parse_mode'               => FieldType::optional('string'),
            'entities'                 => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'disable_web_page_preview' => FieldType::optional('boolean'),
        ];
    }
}
