<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a transaction with a user.
 *
 * @property string $type Type of the transaction partner, always "user"
 * @property string $transaction_type Type of the transaction, currently one of "invoice_payment" for payments via invoices, "paid_media_payment" for payments for paid media, "gift_purchase" for gifts sent by the bot, "premium_purchase" for Telegram Premium subscriptions gifted by the bot, "business_account_transfer" for direct transfers from managed business accounts
 * @property User $user Information about the user
 * @property AffiliateInfo|null $affiliate Optional. Information about the affiliate that received a commission via this transaction. Can be available only for "invoice_payment" and "paid_media_payment" transactions.
 * @property string|null $invoice_payload Optional. Bot-specified invoice payload. Can be available only for "invoice_payment" transactions.
 * @property int|null $subscription_period Optional. The duration of the paid subscription. Can be available only for "invoice_payment" transactions.
 * @property PaidMedia[]|null $paid_media Optional. Information about the paid media bought by the user; for "paid_media_payment" transactions only
 * @property string|null $paid_media_payload Optional. Bot-specified paid media payload. Can be available only for "paid_media_payment" transactions.
 * @property Gift|null $gift Optional. The gift sent to the user by the bot; for "gift_purchase" transactions only
 * @property int|null $premium_subscription_duration Optional. Number of months the gifted Telegram Premium subscription will be active for; for "premium_purchase" transactions only
 *
 * @method string type()
 * @method string transactionType()
 * @method User user()
 * @method AffiliateInfo|null affiliate()
 * @method string|null invoicePayload()
 * @method int|null subscriptionPeriod()
 * @method PaidMedia[]|null paidMedia()
 * @method string|null paidMediaPayload()
 * @method Gift|null gift()
 * @method int|null premiumSubscriptionDuration()
 *
 * @method static setType(string $type)
 * @method static setTransactionType(string $transactionType)
 * @method static setUser(User $user)
 * @method static setAffiliate(AffiliateInfo|null $affiliate)
 * @method static setInvoicePayload(string|null $invoicePayload)
 * @method static setSubscriptionPeriod(int|null $subscriptionPeriod)
 * @method static setPaidMedia(PaidMedia[]|null $paidMedia)
 * @method static setPaidMediaPayload(string|null $paidMediaPayload)
 * @method static setGift(Gift|null $gift)
 * @method static setPremiumSubscriptionDuration(int|null $premiumSubscriptionDuration)
 *
 * @see https://core.telegram.org/bots/api#transactionpartneruser
 */
class TransactionPartnerUser extends TransactionPartner
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                          => FieldType::single('string'),
            'transaction_type'              => FieldType::single('string'),
            'user'                          => FieldType::single(User::class),
            'affiliate'                     => FieldType::optional(AffiliateInfo::class),
            'invoice_payload'               => FieldType::optional('string'),
            'subscription_period'           => FieldType::optional('integer'),
            'paid_media'                    => new FieldType(PaidMedia::class, allowArrays: true, allowNull: true, subTypes: []),
            'paid_media_payload'            => FieldType::optional('string'),
            'gift'                          => FieldType::optional(Gift::class),
            'premium_subscription_duration' => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('user');
    }
}
