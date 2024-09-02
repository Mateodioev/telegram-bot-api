<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This class is returned when an error occurs.
 *
 * @property bool   $ok
 * @property int    $error_code
 * @property string $description
 * @property mixed  $parameters
 */
class Error extends abstractType
{
    public function __construct(
        public bool $ok,
        public int $error_code,
        public string $description,
        public mixed $parameters = null
    ) {
        parent::__construct([
            'ok'          => $ok,
            'error_code'  => $error_code,
            'description' => $description,
            'parameters'  => $parameters
        ]);
    }
    protected function boot(): void
    {
        $this->fields = [
            'ok'          => FieldType::single('boolean'),
            'error_code'  => FieldType::single('integer'),
            'description' => FieldType::single('string'),
            'parameters'  => FieldType::mixed()
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
