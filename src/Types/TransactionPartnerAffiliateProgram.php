<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes the affiliate program that issued the affiliate commission received via this transaction.
 *
 * @property string $type Type of the transaction partner, always "affiliate_program"
 * @property User|null $sponsor_user Optional. Information about the bot that sponsored the affiliate program
 * @property int $commission_per_mille The number of Telegram Stars received by the bot for each 1000 Telegram Stars received by the affiliate program sponsor from referred users
 *
 * @method string type()
 * @method User|null sponsorUser()
 * @method int commissionPerMille()
 *
 * @method static setType(string $type)
 * @method static setSponsorUser(User|null $sponsorUser)
 * @method static setCommissionPerMille(int $commissionPerMille)
 *
 * @see https://core.telegram.org/bots/api#transactionpartneraffiliateprogram
 */
class TransactionPartnerAffiliateProgram extends TransactionPartner
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                 => FieldType::single('string'),
            'sponsor_user'         => FieldType::optional(User::class),
            'commission_per_mille' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())->setType('affiliate_program');
    }
}
