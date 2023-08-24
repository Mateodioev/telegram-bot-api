<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
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
