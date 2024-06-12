<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes the bot's menu button in a private chat. It should be one of
 * - MenuButtonCommands
 * - MenuButtonWebApp
 * - MenuButtonDefault
 * If a menu button other than MenuButtonDefault is set for a private chat, then it is applied in the chat. Otherwise the default menu button is applied. By default, the menu button opens the list of bot commands.
 *
 * @see https://core.telegram.org/bots/api#menubutton
 */
class MenuButton extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [];
    }

    public static function childs(): array
    {
        return [
            MenuButtonCommands::class,
            MenuButtonWebApp::class,
            MenuButtonDefault::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'commands' => MenuButtonCommands::class,
            'web_app' => MenuButtonWebApp::class,
            'default' => MenuButtonDefault::class,
            default => throw new TelegramParamException('Invalid type: ' . $update['type'] . ' in MenuButton')
        };
    }
}
