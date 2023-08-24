<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object defines the criteria used to request a suitable chat. The identifier of the selected chat will be shared with the bot when the corresponding button is pressed. More about requesting chats: https://core.telegram.org/bots/features#chat-and-user-selection
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 */
class KeyboardButtonRequestChat extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'request_id'                => FieldType::single('integer'),
            'chat_is_channel'           => FieldType::single('boolean'),
            'chat_is_forum'             => FieldType::optional('boolean'),
            'chat_has_username'         => FieldType::optional('boolean'),
            'chat_is_created'           => FieldType::optional('boolean'),
            'user_administrator_rights' => FieldType::optional(ChatAdministratorRights::class),
            'bot_administrator_rights'  => FieldType::optional(ChatAdministratorRights::class),
            'bot_is_member'             => FieldType::optional('boolean'),
        ];
    }
}
