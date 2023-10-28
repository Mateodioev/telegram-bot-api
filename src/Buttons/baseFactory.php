<?php

namespace Mateodioev\Bots\Telegram\Buttons;

use Mateodioev\Bots\Telegram\Interfaces\{
    ButtonInterface,
    TypesInterface
};

use function is_array;
use function json_encode;

abstract class baseFactory implements ButtonInterface
{
    public function __toString(): string
    {
        $obj = $this->get();

        if (is_array($obj)) {
            return json_encode($obj);
        }

        return $this->getObject($obj);
    }

    private function getObject(TypesInterface $obj): string
    {
        return json_encode(
            $obj->getReduced()
        );
    }
}
