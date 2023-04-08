<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) that appears right next to the message it belongs to.
 * 
 * @property InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of [InlineKeyboardButton](https://core.telegram.org/bots/api#inlinekeyboardbutton) objects
 * 
 * @method InlineKeyboardButton[][] inlineKeyboard()
 * 
 * @method static setInlineKeyboard(array $inlineKeyboard)
 * 
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends baseType
{
    protected array $fields = [
        'inline_keyboard' => 'array',
    ];

    public function set_inline_keyboard(array $inline_keyboard): static
    {
        $keyboard = [];
        foreach ($inline_keyboard as $inlineKeyboard) {
            $keyboard[] = InlineKeyboardButton::bulkCreate($inlineKeyboard);
        }
        $this->inline_keyboard = $keyboard;
        return $this;
    }

    public function get()
    {
        $properties = [];

        foreach ($this->inlineKeyboard() as $keyboards) {
            $properties['inline_keyboard'][] = array_map(fn ($keyboard) => $keyboard->get(), $keyboards);
        }
        
        return $properties;
    }
}
