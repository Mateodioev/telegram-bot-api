<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a transaction with a user.
 *
 * @property string $type Type of the transaction partner, always "user"
 * @property User $user Information about the user
 * @property string|null $invoice_payload Optional. Bot-specified invoice payload
 * @property int|null $subscription_period Optional. The duration of the paid subscription
 * @property PaidMedia[]|null $paid_media Optional. Information about the paid media bought by the user
 * @property string|null $paid_media_payload Optional. Bot-specified paid media payload
 * @property Gift|null $gift Optional. The gift sent to the user by the bot
 *
 * @method string type()
 * @method User user()
 * @method string|null invoicePayload()
 * @method int|null subscriptionPeriod()
 * @method PaidMedia[]|null paidMedia()
 * @method string|null paidMediaPayload()
 * @method Gift|null gift()
 *
 * @method static setType(string $type)
 * @method static setUser(User $user)
 * @method static setInvoicePayload(string|null $invoicePayload)
 * @method static setSubscriptionPeriod(int|null $subscriptionPeriod)
 * @method static setPaidMedia(PaidMedia[]|null $paidMedia)
 * @method static setPaidMediaPayload(string|null $paidMediaPayload)
 * @method static setGift(Gift|null $gift)
 *
 * @see https://core.telegram.org/bots/api#transactionpartneruser
 */
class TransactionPartnerUser extends TransactionPartner
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                => FieldType::single('string'),
            'user'                => FieldType::single(User::class),
            'invoice_payload'     => FieldType::optional('string'),
            'subscription_period' => FieldType::optional('integer'),
            'paid_media'          => new FieldType(PaidMedia::class, allowArrays: true, allowNull: true, subTypes: []),
            'paid_media_payload'  => FieldType::optional('string'),
            'gift'                => FieldType::optional(Gift::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())->setType('user');
    }
}
