<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes data required for decrypting and authenticating EncryptedPassportElement. See the Telegram Passport Documentation for a complete description of the data decryption and authentication processes.
 *
 * @see https://core.telegram.org/bots/api#encryptedcredentials
 */
class EncryptedCredentials extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'data'   => FieldType::single('string'),
            'hash'   => FieldType::single('string'),
            'secret' => FieldType::single('string'),
        ];
    }
}
