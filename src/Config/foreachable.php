<?php

namespace Mateodioev\Bots\Telegram\Config;

/**
 * @internal This class is not meant to be used by library users.
 */
abstract class foreachable implements \Iterator
{
    private int $position = 0;

    public function current(): mixed
    {
        return $this->getArray()[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->getArray()[$this->position]);
    }

    abstract protected function getArray(): array;
}
