<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will display unsupported message.
 *
 * @property InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
 *
 * @method InlineKeyboardButton[][] inlineKeyboard()
 *
 * @method static setInlineKeyboard(InlineKeyboardButton[][] $inlineKeyboard)
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'inline_keyboard' => FieldType::multiple('mixed')->withCustomClass(InlineKeyboardButton::class),
        ];
    }

    public function setInlineKeyboard(array $inline_keyboard): static
    {
        $keyboard = [];
        foreach ($inline_keyboard as $inlineKeyboard) {
            $keyboard[] = InlineKeyboardButton::bulkCreate($inlineKeyboard);
        }
        $this->properties['inline_keyboard'] = $keyboard;
        return $this;
    }

    public function get(): array
    {
        $properties = [];

        // Avoid calling magic methods
        foreach ($this->properties['inline_keyboard'] as $keyboards) {
            $properties['inline_keyboard'][] = array_map(fn ($keyboard) => $keyboard->get(), $keyboards);
        }

        return $properties;
    }
}
