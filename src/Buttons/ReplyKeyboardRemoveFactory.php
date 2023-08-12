<?php

namespace Mateodioev\Bots\Telegram\Buttons;

use Mateodioev\Bots\Telegram\Types\ReplyKeyboardRemove;

class ReplyKeyboardRemoveFactory extends baseFactory
{
    private ReplyKeyboardRemove $button;

    public function __construct(bool $selective = true)
    {
        $this->button = new ReplyKeyboardRemove();
        $this->button->remove_keyboard = true;
        $this->button->selective       = $selective;
    }

    /**
     * @return ReplyKeyboardRemove
     */
    public function get()
    {
        return $this->button;
    }
}
