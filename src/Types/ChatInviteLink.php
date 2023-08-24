<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an invite link for a chat.
 *
 * @see https://core.telegram.org/bots/api#chatinvitelink
 */
class ChatInviteLink extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'invite_link'                => FieldType::single('string'),
            'creator'                    => FieldType::single(User::class),
            'creates_join_request'       => FieldType::single('boolean'),
            'is_primary'                 => FieldType::single('boolean'),
            'is_revoked'                 => FieldType::single('boolean'),
            'name'                       => FieldType::optional('string'),
            'expire_date'                => FieldType::optional('integer'),
            'member_limit'               => FieldType::optional('integer'),
            'pending_join_request_count' => FieldType::optional('integer'),
        ];
    }
}
