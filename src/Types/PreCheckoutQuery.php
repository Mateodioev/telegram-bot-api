<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

// TODO: terminado

/**
 * This object contains information about an incoming pre-checkout query.
 * 
 * @see https://core.telegram.org/bots/api#precheckoutquery
 */
class PreCheckoutQuery extends TypesBase implements TypesInterface
{
  public string $id;
  public User $from;
  public string $currency;
  public int $total_amount;
  public string $invoice_payload;
  public ?string $shipping_option_id;
  public ?OrderInfo $order_info;

  public function __construct(stdClass $up) {
    $this->setId($up->id)
      ->setFrom(User::create($up->from))
      ->setCurrency($up->currency)
      ->setTotalAmount($up->total_amount)
      ->setInvoicePayload($up->invoice_payload)
      ->setShippingOptionId($up->shipping_option_id ?? self::DEFAULT_PARAM)
      ->setOrderInfo(OrderInfo::create($up->order_info ?? self::DEFAULT_PARAM));
  }

  public function setId(string $id): PreCheckoutQuery
  {
    $this->id = $id;
    return $this;
  }

  public function setFrom(User $from): PreCheckoutQuery
  {
    $this->from = $from;
    return $this;
  }

  public function setCurrency(string $currency): PreCheckoutQuery
  {
    $this->currency = $currency;
    return $this;
  }

  public function setTotalAmount(int $totalAmount): PreCheckoutQuery
  {
    $this->total_amount = $totalAmount;
    return $this;
  }

  public function setInvoicePayload(string $invoicePayload): PreCheckoutQuery
  {
    $this->invoice_payload = $invoicePayload;
    return $this;
  }

  public function setShippingOptionId(?string $shippingOptionId): PreCheckoutQuery
  {
    $this->shipping_option_id = $shippingOptionId;
    return $this;
  }

  public function setOrderInfo(?OrderInfo $orderInfo): PreCheckoutQuery
  {
    $this->order_info = $orderInfo;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
