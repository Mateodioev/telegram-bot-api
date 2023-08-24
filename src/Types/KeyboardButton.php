<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one button of the reply keyboard. For simple text buttons, String can be used instead of this object to specify the button text. The optional fields web_app, request_user, request_chat, request_contact, request_location, and request_poll are mutually exclusive.
 * Note: request_contact and request_location options will only work in Telegram versions released after 9 April, 2016. Older clients will display unsupported message.
 * Note: request_poll option will only work in Telegram versions released after 23 January, 2020. Older clients will display unsupported message.
 * Note: web_app option will only work in Telegram versions released after 16 April, 2022. Older clients will display unsupported message.
 * Note: request_user and request_chat options will only work in Telegram versions released after 3 February, 2023. Older clients will display unsupported message.
 *
 * @see https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'text'             => FieldType::single('string'),
            'request_user'     => FieldType::optional(KeyboardButtonRequestUser::class),
            'request_chat'     => FieldType::optional(KeyboardButtonRequestChat::class),
            'request_contact'  => FieldType::optional('boolean'),
            'request_location' => FieldType::optional('boolean'),
            'request_poll'     => FieldType::optional(KeyboardButtonPollType::class),
            'web_app'          => FieldType::optional(WebAppInfo::class),
        ];
    }
}
