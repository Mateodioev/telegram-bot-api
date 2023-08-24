<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object defines the criteria used to request a suitable user. The identifier of the selected user will be shared with the bot when the corresponding button is pressed. More about requesting users: https://core.telegram.org/bots/features#chat-and-user-selection
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestuser
 */
class KeyboardButtonRequestUser extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'request_id'      => FieldType::single('integer'),
            'user_is_bot'     => FieldType::optional('boolean'),
            'user_is_premium' => FieldType::optional('boolean'),
        ];
    }
}
