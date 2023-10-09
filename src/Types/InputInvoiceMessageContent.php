<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of an invoice message to be sent as the result of an inline query.
 *
 * @property string $title Product name, 1-32 characters
 * @property string $description Product description, 1-255 characters
 * @property string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
 * @property string $provider_token Payment provider token, obtained via @BotFather
 * @property string $currency Three-letter ISO 4217 currency code, see more on currencies
 * @property LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
 * @property int|null $max_tip_amount Optional. The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
 * @property int[]|null $suggested_tip_amounts Optional. A JSON-serialized array of suggested amounts of tip in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * @property string|null $provider_data Optional. A JSON-serialized object for data about the invoice, which will be shared with the payment provider. A detailed description of the required fields should be provided by the payment provider.
 * @property string|null $photo_url Optional. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
 * @property int|null $photo_size Optional. Photo size in bytes
 * @property int|null $photo_width Optional. Photo width
 * @property int|null $photo_height Optional. Photo height
 * @property bool|null $need_name Optional. Pass True if you require the user's full name to complete the order
 * @property bool|null $need_phone_number Optional. Pass True if you require the user's phone number to complete the order
 * @property bool|null $need_email Optional. Pass True if you require the user's email address to complete the order
 * @property bool|null $need_shipping_address Optional. Pass True if you require the user's shipping address to complete the order
 * @property bool|null $send_phone_number_to_provider Optional. Pass True if the user's phone number should be sent to provider
 * @property bool|null $send_email_to_provider Optional. Pass True if the user's email address should be sent to provider
 * @property bool|null $is_flexible Optional. Pass True if the final price depends on the shipping method
 *
 * @method string title()
 * @method string description()
 * @method string payload()
 * @method string providerToken()
 * @method string currency()
 * @method LabeledPrice[] prices()
 * @method int|null maxTipAmount()
 * @method int[]|null suggestedTipAmounts()
 * @method string|null providerData()
 * @method string|null photoUrl()
 * @method int|null photoSize()
 * @method int|null photoWidth()
 * @method int|null photoHeight()
 * @method bool|null needName()
 * @method bool|null needPhoneNumber()
 * @method bool|null needEmail()
 * @method bool|null needShippingAddress()
 * @method bool|null sendPhoneNumberToProvider()
 * @method bool|null sendEmailToProvider()
 * @method bool|null isFlexible()
 *
 * @method static setTitle(string $title)
 * @method static setDescription(string $description)
 * @method static setPayload(string $payload)
 * @method static setProviderToken(string $providerToken)
 * @method static setCurrency(string $currency)
 * @method static setPrices(LabeledPrice[] $prices)
 * @method static setMaxTipAmount(int|null $maxTipAmount)
 * @method static setSuggestedTipAmounts(int[]|null $suggestedTipAmounts)
 * @method static setProviderData(string|null $providerData)
 * @method static setPhotoUrl(string|null $photoUrl)
 * @method static setPhotoSize(int|null $photoSize)
 * @method static setPhotoWidth(int|null $photoWidth)
 * @method static setPhotoHeight(int|null $photoHeight)
 * @method static setNeedName(bool|null $needName)
 * @method static setNeedPhoneNumber(bool|null $needPhoneNumber)
 * @method static setNeedEmail(bool|null $needEmail)
 * @method static setNeedShippingAddress(bool|null $needShippingAddress)
 * @method static setSendPhoneNumberToProvider(bool|null $sendPhoneNumberToProvider)
 * @method static setSendEmailToProvider(bool|null $sendEmailToProvider)
 * @method static setIsFlexible(bool|null $isFlexible)
 *
 * @see https://core.telegram.org/bots/api#inputinvoicemessagecontent
 */
class InputInvoiceMessageContent extends InputMessageContent
{
    protected function boot(): void
    {
        $this->fields = [
            'title'                         => FieldType::single('string'),
            'description'                   => FieldType::single('string'),
            'payload'                       => FieldType::single('string'),
            'provider_token'                => FieldType::single('string'),
            'currency'                      => FieldType::single('string'),
            'prices'                        => FieldType::multiple(LabeledPrice::class),
            'max_tip_amount'                => FieldType::optional('integer'),
            'suggested_tip_amounts'         => new FieldType('integer', allowArrays: true, allowNull: true, subTypes: []),
            'provider_data'                 => FieldType::optional('string'),
            'photo_url'                     => FieldType::optional('string'),
            'photo_size'                    => FieldType::optional('integer'),
            'photo_width'                   => FieldType::optional('integer'),
            'photo_height'                  => FieldType::optional('integer'),
            'need_name'                     => FieldType::optional('boolean'),
            'need_phone_number'             => FieldType::optional('boolean'),
            'need_email'                    => FieldType::optional('boolean'),
            'need_shipping_address'         => FieldType::optional('boolean'),
            'send_phone_number_to_provider' => FieldType::optional('boolean'),
            'send_email_to_provider'        => FieldType::optional('boolean'),
            'is_flexible'                   => FieldType::optional('boolean'),
        ];
    }
}
