<?php

namespace Mateodioev\Bots\Telegram\Buttons;

use Mateodioev\Bots\Telegram\Types\ForceReply;

class ForceReplyFactory extends baseFactory
{
    private ForceReply $button;

    public function __construct()
    {
        $this->button = new ForceReply;
        $this->button->force_reply = true;
    }

    public function setInputFieldPlaceholder(?string $inputFieldPlaceholder = null): self
    {
        $this->button->input_field_placeholder = $inputFieldPlaceholder;
        return $this;
    }

    public function selective(bool $selective = true): self
    {
        $this->button->selective = $selective;
        return $this;
    }

    public function enableSelective(): self
    {
        return $this->selective(true);
    }

    public function disableSelective(): self
    {
        return $this->selective(false);
    }

    public function get()
    {
        return $this->button;
    }
}
