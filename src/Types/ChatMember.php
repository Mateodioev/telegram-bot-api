<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object contains information about one member of a chat. Currently, the following 6 types of chat members are supported:
 * - ChatMemberOwner
 * - ChatMemberAdministrator
 * - ChatMemberMember
 * - ChatMemberRestricted
 * - ChatMemberLeft
 * - ChatMemberBanned
 *
 * @see https://core.telegram.org/bots/api#chatmember
 */
class ChatMember extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [];
    }

    public static function childs(): array
    {
        return [
            ChatMemberOwner::class,
            ChatMemberAdministrator::class,
            ChatMemberMember::class,
            ChatMemberRestricted::class,
            ChatMemberLeft::class,
            ChatMemberBanned::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['status']) === false) {
            throw new TelegramParamException('Missing status field in ChatMember');
        }

        return match ($update['status']) {
            'creator' => ChatMemberOwner::class,
            'administrator' => ChatMemberAdministrator::class,
            'member' => ChatMemberMember::class,
            'restricted' => ChatMemberRestricted::class,
            'left' => ChatMemberLeft::class,
            'kicked' => ChatMemberBanned::class,
            default => throw new TelegramParamException('Invalid status: ' . $update['status'] . ' in ChatMember')
        };
    }
}
