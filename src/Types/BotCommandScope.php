<?php

declare (strict_types = 1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object represents the scope to which bot commands are applied. Currently, the following 7 scopes are supported:
 * - BotCommandScopeDefault
 * - BotCommandScopeAllPrivateChats
 * - BotCommandScopeAllGroupChats
 * - BotCommandScopeAllChatAdministrators
 * - BotCommandScopeChat
 * - BotCommandScopeChatAdministrators
 * - BotCommandScopeChatMember
 *
 * @see https://core.telegram.org/bots/api#botcommandscope
 */
class BotCommandScope extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }

    public static function childs(): array
    {
        return [
            BotCommandScopeDefault::class,
            BotCommandScopeAllPrivateChats::class,
            BotCommandScopeAllGroupChats::class,
            BotCommandScopeAllChatAdministrators::class,
            BotCommandScopeChat::class,
            BotCommandScopeChatAdministrators::class,
            BotCommandScopeChatMember::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw new TelegramParamException('Missing type field in BotCommandScope');
        }

        return match ($update['type']) {
            'default' => BotCommandScopeDefault::class,
            'all_private_chats' => BotCommandScopeAllPrivateChats::class,
            'all_group_chats' => BotCommandScopeAllGroupChats::class,
            'all_chat_administrators' => BotCommandScopeAllChatAdministrators::class,
            'chat' => BotCommandScopeChat::class,
            'chat_administrators' => BotCommandScopeChatAdministrators::class,
            'chat_member' => BotCommandScopeChatMember::class,
            default => throw new TelegramParamException('Invalid type: ' . $update['type'] . ' in BotCommandScope')
        };
    }
}
