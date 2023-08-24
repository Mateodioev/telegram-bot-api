<?php

namespace Mateodioev\Bots\Telegram\Types;

/**
 * 
 * @property boolean $ok 
 * @property integer $error_code 
 * @property string  $description 
 * @property mixed   $result 
 * 
 * @method boolean ok()
 * @method integer errorCode()
 * @method string  description()
 * @method mixed   result()
 * 
 * @method static setOk(boolean $ok)
 * @method static setErrorCode(integer $errorCode)
 * @method static setDescription(string $description)
 * @method static setResult(mixed $result)
 */
class Response extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'ok'          => 'boolean',
            'error_code'  => 'integer',
            'description' => 'string',
            'result'      => 'mixed',
        ];
    }
}
