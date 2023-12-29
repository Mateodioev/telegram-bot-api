<?php

namespace Tools\Gen;

use function join;
use function array_map;

trait phpDocDescription
{
    public function descriptionStr()
    {
        return join("\n", $this->description);
    }

    /**
     * Format field description for phpDoc.
     */
    public function docDescription(): array
    {
        return array_map(fn ($line) => " * $line", $this->description);
    }
}
