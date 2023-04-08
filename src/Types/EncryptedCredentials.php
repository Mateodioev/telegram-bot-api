<?php 

namespace Mateodioev\Bots\Telegram\Types;

use function base64_decode;

/**
 * Describes data required for decrypting and authenticating [EncryptedPassportElement](https://core.telegram.org/bots/api#encryptedpassportelement).
 * 
 * @property string $data   Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets required for [EncryptedPassportElement](https://core.telegram.org/bots/api#encryptedpassportelement) decryption and authentication
 * @property string $hash   Base64-encoded data hash for data authentication
 * @property string $secret Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
 * 
 * @method string data()
 * @method string hash()
 * @method string secret()
 * @method string decrypData()
 * @method string decrypHash()
 * @method string decrypSecret()
 * 
 * @method static setData(string $data)
 * @method static setHash(string $hash)
 * @method static setSecret(string $secret)
 * 
 * @see https://core.telegram.org/bots/api#encryptedcredentials
 */
class EncryptedCredentials extends baseType
{
    protected array $fields = [
        'data'   => 'string',
        'hash'   => 'string',
        'secret' => 'string',
    ];

    public function decrypData(): string {
        return base64_decode($this->data());
    }

    public function decrypHash(): string {
        return base64_decode($this->hash());
    }

    public function decrypSecret(): string {
        return base64_decode($this->secret());
    }
}
