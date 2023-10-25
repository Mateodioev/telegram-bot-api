<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This class is returned when an error occurs.
 *
 * @property int    $ok
 * @property int    $error_code
 * @property string $description
 * @property mixed  $parameters
 */
class Error extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'ok'          => FieldType::single('boolean'),
            'error_code'  => FieldType::single('integer'),
            'description' => FieldType::single('string'),
            'parameters'  => FieldType::mixed()
        ];
    }
}
