<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes data required for decrypting and authenticating EncryptedPassportElement. See the Telegram Passport Documentation for a complete description of the data decryption and authentication processes.
 *
 * @property string $data Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets required for EncryptedPassportElement decryption and authentication
 * @property string $hash Base64-encoded data hash for data authentication
 * @property string $secret Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
 *
 * @method string data()
 * @method string hash()
 * @method string secret()
 *
 * @method static setData(string $data)
 * @method static setHash(string $hash)
 * @method static setSecret(string $secret)
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
