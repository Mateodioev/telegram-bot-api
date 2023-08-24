<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes Telegram Passport data shared with the bot by the user.
 *
 * @see https://core.telegram.org/bots/api#passportdata
 */
class PassportData extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'data'        => FieldType::multiple(EncryptedPassportElement::class),
            'credentials' => FieldType::single(EncryptedCredentials::class),
        ];
    }
}
