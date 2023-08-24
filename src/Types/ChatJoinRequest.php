<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a join request sent to a chat.
 *
 * @property Chat $chat Chat to which the request was sent
 * @property User $from User that sent the join request
 * @property int $user_chat_id Identifier of a private chat with the user who sent the join request. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot can use this identifier for 24 hours to send messages until the join request is processed, assuming no other administrator contacted the user.
 * @property int $date Date the request was sent in Unix time
 * @property ?string $bio Optional. Bio of the user.
 * @property ?ChatInviteLink $invite_link Optional. Chat invite link that was used by the user to send the join request
 *
 * @method Chat chat()
 * @method User from()
 * @method int userChatId()
 * @method int date()
 * @method ?string bio()
 * @method ?ChatInviteLink inviteLink()
 *
 * @method static setChat(Chat $chat)
 * @method static setFrom(User $from)
 * @method static setUserChatId(int $userChatId)
 * @method static setDate(int $date)
 * @method static setBio(?string $bio)
 * @method static setInviteLink(?ChatInviteLink $inviteLink)
 *
 * @see https://core.telegram.org/bots/api#chatjoinrequest
 */
class ChatJoinRequest extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'chat'         => FieldType::single(Chat::class),
            'from'         => FieldType::single(User::class),
            'user_chat_id' => FieldType::single('integer'),
            'date'         => FieldType::single('integer'),
            'bio'          => FieldType::optional('string'),
            'invite_link'  => FieldType::optional(ChatInviteLink::class),
        ];
    }
}
