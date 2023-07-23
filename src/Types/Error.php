<?php

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This class is returned when an error occurs.
 */
class Error extends baseType
{
  protected array $fields = [
    'ok'          => 'boolean',
    'error_code'  => 'integer',
    'description' => 'string',
    'parameters'  => 'mixed'
  ];
}
