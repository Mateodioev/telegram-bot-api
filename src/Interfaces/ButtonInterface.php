<?php

namespace Mateodioev\Bots\Telegram\Interfaces;

use Stringable;

interface ButtonInterface extends Stringable
{
    /**
     * Get button as a base object
     * @return TypesInterface
     */
    public function get();

    /**
     * Get button as string (json)
     */
    public function __toString(): string;
}
