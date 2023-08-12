<?php

namespace Mateodioev\Bots\Telegram\Buttons;

use Mateodioev\Bots\Telegram\Config\Types;
use Mateodioev\Bots\Telegram\Interfaces\{
    ButtonInterface,
    TypesInterface
};

use function is_array, json_encode;

abstract class baseFactory implements ButtonInterface
{
    public function __toString(): string
    {
        $obj = $this->get();

        if (is_array($obj))
            return json_encode($obj);

        return $this->getObject($obj);
    }

    private function getObject(TypesInterface $obj): string
    {
        $conf = Types::$returnNullParams;
        Types::setReturnNullParams(false);

        // if ($obj instanceof TypesInterface)
        $json = $obj->toString();

        Types::setReturnNullParams($conf);

        return $json;
    }
}
