<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a chat photo.
 *
 * @see https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhoto extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'small_file_id'        => FieldType::single('string'),
            'small_file_unique_id' => FieldType::single('string'),
            'big_file_id'          => FieldType::single('string'),
            'big_file_unique_id'   => FieldType::single('string'),
        ];
    }
}
