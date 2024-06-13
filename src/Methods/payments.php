<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\LabeledPrice;
use Mateodioev\Bots\Telegram\Types\Message;

trait payments
{
    /**
     * Use this method to send invoices.
     *
     * @param LabeledPrice[] $prices
     * 
     * @see https://core.telegram.org/bots/api#sendinvoice
     * @return Message
     */
    public function sendInvoice(
        string|int $chatID,
        string $title,
        string $description,
        string $payload,
        string $currency,
        array $prices,
        array $params = [],
    ): TypesInterface {
        return $this->request(Method::create([
            'chat_id'     => $chatID,
            'title'       => $title,
            'description' => $description,
            'payload'     => $payload,
            'currency'    => $currency,
            'prices'      => json_encode($prices),
            ...$params,
        ], 'sendInvoice'));
    }
}
