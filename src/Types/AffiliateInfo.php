<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Contains information about the affiliate that received a commission via this transaction.
 *
 * @property User|null $affiliate_user Optional. The bot or the user that received an affiliate commission if it was received by a bot or a user
 * @property Chat|null $affiliate_chat Optional. The chat that received an affiliate commission if it was received by a chat
 * @property int $commission_per_mille The number of Telegram Stars received by the affiliate for each 1000 Telegram Stars received by the bot from referred users
 * @property int $amount Integer amount of Telegram Stars received by the affiliate from the transaction, rounded to 0; can be negative for refunds
 * @property int|null $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars received by the affiliate; from -999999999 to 999999999; can be negative for refunds
 *
 * @method User|null affiliateUser()
 * @method Chat|null affiliateChat()
 * @method int commissionPerMille()
 * @method int amount()
 * @method int|null nanostarAmount()
 *
 * @method static setAffiliateUser(User|null $affiliateUser)
 * @method static setAffiliateChat(Chat|null $affiliateChat)
 * @method static setCommissionPerMille(int $commissionPerMille)
 * @method static setAmount(int $amount)
 * @method static setNanostarAmount(int|null $nanostarAmount)
 *
 * @see https://core.telegram.org/bots/api#affiliateinfo
 */
class AffiliateInfo extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'affiliate_user'       => FieldType::optional(User::class),
            'affiliate_chat'       => FieldType::optional(Chat::class),
            'commission_per_mille' => FieldType::single('integer'),
            'amount'               => FieldType::single('integer'),
            'nanostar_amount'      => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
