<?php

declare (strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

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
    // TODO: add method getChild(string $class): string
}
