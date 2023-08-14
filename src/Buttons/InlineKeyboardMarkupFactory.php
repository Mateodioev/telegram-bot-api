<?php

namespace Mateodioev\Bots\Telegram\Buttons;

use Mateodioev\Bots\Telegram\Types\{
    InlineKeyboardButton,
    InlineKeyboardMarkup
};

class InlineKeyboardMarkupFactory extends baseFactory
{
    private InlineKeyboardMarkup $button;

    /** InlineKeyboardButton[][] */
    private array $rows = [];
    private int $line   = 0;

    public function __construct()
    {
        $this->button = new InlineKeyboardMarkup();
    }

    /**
     * Add new button to keyboard
     */
    public function addCeil(array|InlineKeyboardButton $ceil): static
    {
        if (is_array($ceil))
            $ceil = InlineKeyboardButton::createFromArray($ceil);

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
     * @return InlineKeyboardMarkup
     */
    public function get()
    {
        $this->rows = \array_filter($this->rows);

        return $this->button->setInlineKeyboard($this->rows);
    }
}
