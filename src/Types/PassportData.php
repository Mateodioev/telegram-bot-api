<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Describes Telegram Passport data shared with the bot by the user.
 * 
 * @property EncryptedPassportElement[] $data        Array with information about documents and other Telegram Passport elements that was shared with the bot
 * @property EncryptedCredentials       $credentials Encrypted credentials required to decrypt the data
 * 
 * @method EncryptedPassportElement[] data()
 * @method EncryptedCredentials       credentials()
 * 
 * @method static setData(EncryptedPassportElement[] $data)
 * @method static setCredentials(EncryptedCredentials $credentials)
 * 
 * @see https://core.telegram.org/bots/api#passportdata
 */
class PassportData extends baseType
{
    protected array $fields = [
        'data'        => [EncryptedPassportElement::class],
        'credentials' => EncryptedCredentials::class,
    ];

    public function get()
    {
        return $this->recursiveGet();
    }
}
