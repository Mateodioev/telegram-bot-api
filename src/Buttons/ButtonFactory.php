<?php

namespace Mateodioev\Bots\Telegram\Buttons;

use Mateodioev\Bots\Telegram\Types\ReplyKeyboardMarkup;

class ButtonFactory
{
    /**
     * This object represents an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) that appears right next to the message it belongs to.
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
     */
    public static function inlineKeyboardMarkup(): InlineKeyboardMarkupFactory
    {
        return new InlineKeyboardMarkupFactory;
    }

    /**
     * This object represents a [custom keyboard](https://core.telegram.org/bots/features#keyboards) with reply options
     * 
     * @see https://core.telegram.org/bots/api#replykeyboardmarkup
     */
    public static function replyKeyboardMarkup(
        bool    $isPersistent          = false,
        bool    $resizekeyboard        = false,
        bool    $oneTimeKeyboard       = false,
        ?string $inputFieldPlaceholder = null,
        bool    $selective             = true
    ): ReplyKeyboardMarkupFactory {
        $replyKeyboardMarkup = new ReplyKeyboardMarkup;
        $replyKeyboardMarkup->is_persistent           = $isPersistent;
        $replyKeyboardMarkup->resize_keyboard         = $resizekeyboard;
        $replyKeyboardMarkup->one_time_keyboard       = $oneTimeKeyboard;
        $replyKeyboardMarkup->input_field_placeholder = $inputFieldPlaceholder;
        $replyKeyboardMarkup->selective               = $selective;

        return new ReplyKeyboardMarkupFactory($replyKeyboardMarkup);
    }

    /**
     * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard and display the default letter-keyboard.
     *
     * @see https://core.telegram.org/bots/api#replykeyboardremove
     */
    public static function replyKeyboardRemove(bool $selective = true): ReplyKeyboardRemoveFactory
    {
        return new ReplyKeyboardRemoveFactory($selective);
    }

    /**
     * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user has selected the bot's message and tapped 'Reply').
     * This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode.
     *
     * @see https://core.telegram.org/bots/api#forcereply
     */
    public static function forceReply(): ForceReplyFactory
    {
        return new ForceReplyFactory;
    }
}
