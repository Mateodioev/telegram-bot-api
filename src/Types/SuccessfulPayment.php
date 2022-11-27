<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object contains basic information about a successful payment.
 * 
 * @see https://core.telegram.org/bots/api#successfulpayment
 */
class SuccessfulPayment extends TypesBase implements TypesInterface
{
  public string $currency;
  public int $total_amount;
  public string $invoice_payload;
  public ?string $shipping_option_id;
  public ?OrderInfo $order_info;
  public string $telegram_payment_charge_id;
  public string $provider_payment_charge_id;


  public function __construct(stdClass $up) {
    $this->setCurrency($up->currency)
      ->setTotalAmount($up->total_amount)
      ->setInvoicePayload($up->invoice_payload)
      ->setShippingOptionId($up->shipping_option_id ?? self::DEFAULT_PARAM)
      ->setOrderInfo(OrderInfo::create($up->order_info ?? self::DEFAULT_PARAM))
      ->setTelegramPaymentChargeId($up->telegram_payment_charge_id)
      ->setProviderPaymentChargeId($up->provider_payment_charge_id);
  }
  public function setCurrency(string $currency): SuccessfulPayment
  {
    $this->currency = $currency;
    return $this;
  }
  
  public function setTotalAmount(int $totalAmount): SuccessfulPayment
  {
    $this->total_amount = $totalAmount;
    return $this;
  }
  
  public function setInvoicePayload(string $invoicePayload): SuccessfulPayment
  {
    $this->invoice_payload = $invoicePayload;
    return $this;
  }

  public function setShippingOptionId(?string $shippingOptionId): SuccessfulPayment
  {
    $this->shipping_option_id = $shippingOptionId;
    return $this;
  }

  public function setOrderInfo(?OrderInfo $orderInfo): SuccessfulPayment
  {
    $this->order_info = $orderInfo;
    return $this;
  }

  public function setTelegramPaymentChargeId(string $telegramPaymentChargeId): SuccessfulPayment
  {
    $this->telegram_payment_charge_id = $telegramPaymentChargeId;
    return $this;
  }

  public function setProviderPaymentChargeId(string $providerPaymentChargeId): SuccessfulPayment
  {
    $this->provider_payment_charge_id = $providerPaymentChargeId;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
