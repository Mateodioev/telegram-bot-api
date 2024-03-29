<?php

namespace Mateodioev\Bots\Telegram\Buttons;

use Mateodioev\Bots\Telegram\Types\{
    KeyboardButton,
    ReplyKeyboardMarkup
};

class ReplyKeyboardMarkupFactory extends baseFactory
{
    private ReplyKeyboardMarkup $button;
    private array $rows = [];
    private int $line   = 0;

    public function __construct(?ReplyKeyboardMarkup $button = null)
    {
        $this->button = $button ?? new ReplyKeyboardMarkup();
    }

    /**
     * Add new button to keyboard
     */
    public function addCeil(array|KeyboardButton $ceil): static
    {
        if (is_array($ceil))
            $ceil = KeyboardButton::createFromArray($ceil);

        $this->rows[$this->line][] = $ceil;
        return $this;
    }

    /**
     * Add new row to keyboard
     */
    public function addLine(): static
    {
        $this->line++;
        return $this;
    }

    /**
     * @return ReplyKeyboardMarkup
     */
    public function get()
    {
        $this->rows = \array_filter($this->rows);

        return $this->button->set_keyboard($this->rows);
    }
}
