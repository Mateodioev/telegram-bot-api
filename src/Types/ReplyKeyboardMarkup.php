<?php

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a [custom keyboard](https://core.telegram.org/bots/features#keyboards) with reply options (see [Introduction to bots](https://core.telegram.org/bots/features#keyboards) for details and examples).
 * 
 * @property KeyboardButton[][] $keyboard                Array of button rows, each represented by an Array of [KeyboardButton](https://core.telegram.org/bots/api#keyboardbutton) objects
 * @property boolean            $is_persistent           Optional. Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults to false, in which case the custom keyboard can be hidden and opened with a keyboard icon.
 * @property boolean            $resize_keyboard         Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
 * @property boolean            $one_time_keyboard       Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but clients will automatically display the usual letter-keyboard in the chat - the user can press a special button in the input field to see the custom keyboard again. Defaults to false.
 * @property string             $input_field_placeholder Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
 * @property boolean            $selective               Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
 * 
 * @method KeyboardButton[][] keyboard()
 * @method boolean            isPersistent()
 * @method boolean            resizeKeyboard()
 * @method boolean            oneTimeKeyboard()
 * @method string             inputFieldPlaceholder()
 * @method boolean            selective()
 * 
 * @method static setKeyboard(KeyboardButton[][] $keyboard)
 * @method static setIsPersistent(boolean $isPersistent)
 * @method static setResizeKeyboard(boolean $resizeKeyboard)
 * @method static setOneTimeKeyboard(boolean $oneTimeKeyboard)
 * @method static setInputFieldPlaceholder(string $inputFieldPlaceholder)
 * @method static setSelective(boolean $selective)
 * 
 * @see https://core.telegram.org/bots/api#replykeyboardmarkup
 */
class ReplyKeyboardMarkup extends baseType
{
    protected array $fields = [
        'keyboard'                => 'array',
        'is_persistent'           => 'boolean',
        'resize_keyboard'         => 'boolean',
        'one_time_keyboard'       => 'boolean',
        'input_field_placeholder' => 'string',
        'selective'               => 'boolean',
    ];

    public function set_keyboard(array $keyboard): static
    {
        $_keyboard = [];
        foreach ($keyboard as $keyboardRow) {
            $_keyboard[] = KeyboardButton::bulkCreate($keyboardRow);
        }
        $this->properties['keyboard'] = $_keyboard;
        return $this;
    }

    public function get()
    {
        $properties = $this->getProperties();
        unset($properties['keyboard']);

        // Avoid calling magic methods
        foreach ($this->properties['keyboard'] as $keyboards) {
            $properties['keyboard'][] = array_map(fn ($keyboard) => $keyboard->get(), $keyboards);
        }

        return $properties;
    }
}
