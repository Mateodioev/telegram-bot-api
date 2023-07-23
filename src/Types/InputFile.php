<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual way that files are uploaded via the browser.
 * 
 * @property string|\CURLFile $file File to send
 * @property boolean $is_local Default false. True if file is type of {@see \CURLFile}
 * 
 * @internal Use this object to send file
 * @see https://core.telegram.org/bots/api#inputfile
 */
class InputFile extends baseType
{
    protected array $fields = [
        'file' => 'mixed',
        'is_local' => 'boolean'
    ];
}
