<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples).
 *
 * @property KeyboardButton[] $keyboard Array of button rows, each represented by an Array of KeyboardButton objects
 * @property ?bool $is_persistent Optional. Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults to false, in which case the custom keyboard can be hidden and opened with a keyboard icon.
 * @property ?bool $resize_keyboard Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
 * @property ?bool $one_time_keyboard Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but clients will automatically display the usual letter-keyboard in the chat - the user can press a special button in the input field to see the custom keyboard again. Defaults to false.
 * @property ?string $input_field_placeholder Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
 * @property ?bool $selective Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message. Example: A user requests to change the bot's language, bot replies to the request with a keyboard to select the new language. Other users in the group don't see the keyboard.
 *
 * @method KeyboardButton[][] keyboard()
 * @method ?bool isPersistent()
 * @method ?bool resizeKeyboard()
 * @method ?bool oneTimeKeyboard()
 * @method ?string inputFieldPlaceholder()
 * @method ?bool selective()
 *
 * @method static setKeyboard(KeyboardButton[][] $keyboard)
 * @method static setIsPersistent(?bool $isPersistent)
 * @method static setResizeKeyboard(?bool $resizeKeyboard)
 * @method static setOneTimeKeyboard(?bool $oneTimeKeyboard)
 * @method static setInputFieldPlaceholder(?string $inputFieldPlaceholder)
 * @method static setSelective(?bool $selective)
 *
 * @see https://core.telegram.org/bots/api#replykeyboardmarkup
 */
class ReplyKeyboardMarkup extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'keyboard'                => (new FieldType('mixed', true))->withCustomClass(InlineKeyboardButton::class),
            'is_persistent'           => FieldType::optional('boolean'),
            'resize_keyboard'         => FieldType::optional('boolean'),
            'one_time_keyboard'       => FieldType::optional('boolean'),
            'input_field_placeholder' => FieldType::optional('string'),
            'selective'               => FieldType::optional('boolean'),
        ];
    }

    public function setKeyboard(array $keyboard): static
    {
        $_keyboard = [];
        foreach ($keyboard as $keyboardRow) {
            $_keyboard[] = KeyboardButton::bulkCreate($keyboardRow);
        }
        $this->properties['keyboard'] = $_keyboard;
        return $this;
    }

    public function get(): array
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
