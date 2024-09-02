<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
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
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
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
            ChatMemberOwner::STATUS => ChatMemberOwner::class,
            ChatMemberAdministrator::STATUS => ChatMemberAdministrator::class,
            ChatMemberMember::STATUS => ChatMemberMember::class,
            ChatMemberRestricted::STATUS => ChatMemberRestricted::class,
            ChatMemberLeft::STATUS => ChatMemberLeft::class,
            ChatMemberBanned::STATUS => ChatMemberBanned::class,
            default => throw new TelegramParamException('Invalid status: ' . $update['status'] . ' in ChatMember')
        };
    }
}
