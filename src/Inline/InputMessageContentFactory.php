<?php

namespace Mateodioev\Bots\Telegram\Inline;

use Mateodioev\Bots\Telegram\Config\ParseMode;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Types\{
    InputContactMessageContent,
    InputInvoiceMessageContent,
    InputLocationMessageContent,
    InputTextMessageContent,
    InputVenueMessageContent,
    LabeledPrice
};

/**
 * This object represents the content of a message to be sent as a result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent
 */
final class InputMessageContentFactory
{
    private const TEXT_LIMIT = 4096;

    /**
     * Represents the content of a text message to be sent as the result of an inline query
     *
     * @see https://core.telegram.org/bots/api#inputtextmessagecontent
     */
    public static function text(string $text, ParseMode $parseMode = ParseMode::HTML, array $params = []): InputTextMessageContent
    {
        if (\strlen($text) > self::TEXT_LIMIT)
            throw new TelegramParamException('Text length exceeds maximum limit');

        return new InputTextMessageContent([
            'message_text' => $text,
            'parse_mode'   => $parseMode->value,
            ...$params
        ]);
    }

    /**
     * Represents the content of a location message to be sent as the result of an inline query.
     *
     * @see https://core.telegram.org/bots/api#inputlocationmessagecontent
     */
    public static function location(float $latitude, float $longitude, array $params = []): InputLocationMessageContent
    {
        return new InputLocationMessageContent([
            'latitude'  => $latitude,
            'longitude' => $longitude,
            ...$params
        ]);
    }

    /**
     * Represents the content of a venue message to be sent as the result of an inline query.
     *
     * @see https://core.telegram.org/bots/api#inputvenuemessagecontent
     */
    public static function venue(float $latitude, float $longitude, string $title, string $address, array $params = []): InputVenueMessageContent
    {
        return new InputVenueMessageContent([
            'latitude'  => $latitude,
            'longitude' => $longitude,
            'title'     => $title,
            'address'   => $address,
            ...$params
        ]);
    }

    /**
     * Represents the content of a contact message to be sent as the result of an inline query.
     *
     * @see https://core.telegram.org/bots/api#inputcontactmessagecontent
     */
    public static function contact(string $phoneNumber, string $firstName, array $params = []): InputContactMessageContent
    {
        return new InputContactMessageContent([
            'phone_number' => $phoneNumber,
            'first_name'   => $firstName,
            ...$params
        ]);
    }

    /**
     * Represents the content of an invoice message to be sent as the result of an inline query.
     *
     * @see https://core.telegram.org/bots/api#inputinvoicemessagecontent
     */
    public static function invoice(string $title, string $description, string $payload, string $providerToken, string $currency, array $prices, array $params = []): InputInvoiceMessageContent
    {
        $prices = \array_map(fn (LabeledPrice $price) => $price->getReduced(), $prices);
        $prices = \json_encode($prices);

        return new InputInvoiceMessageContent([
            'title'          => $title,
            'description'    => $description,
            'payload'        => $payload,
            'provider_token' => $providerToken,
            'currency'       => $currency,
            'prices'         => $prices,
            ...$params
        ]);
    }
}