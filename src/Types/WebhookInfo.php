<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Describes the current status of a webhook.
 * 
 * @see https://core.telegram.org/bots/api#webhookinfo
 */
class WebhookInfo extends TypesBase implements TypesInterface
{
  public string $url;
  public bool $has_custom_certificate;
  public int $pending_update_count;
  public ?string $ip_address;
  public ?int $last_error_date;
  public ?string $last_error_message;
  public ?int $last_synchronization_error_date;
  public ?int $max_connections;
  public ?array $allowed_updates;

  public function __construct(stdClass $up) {
    $this->setUrl($up->url)
      ->setHasCustomCertificate($up->has_custom_certificate);
  }

  public function setUrl(string $url): WebhookInfo
  {
    $this->url = $url;
    return $this;
  }

  public function setHasCustomCertificate(bool $hasCustomCertificate): WebhookInfo
  {
    $this->has_custom_certificate = $hasCustomCertificate;
    return $this;
  }

  public function setPendingUpdateCount(int $pendingUpdateCount): WebhookInfo
  {
    $this->pending_update_count = $pendingUpdateCount;
    return $this;
  }

  public function setIpAddress(?string $ipAddress): WebhookInfo
  {
    $this->ip_address = $ipAddress;
    return $this;
  }

  public function setLastErrorDate(?int $lastErrorDate): WebhookInfo
  {
    $this->last_error_date = $lastErrorDate;
    return $this;
  }

  public function setLasErrorMessage(?string $lastErrorMessage): WebhookInfo
  {
    $this->last_error_message = $lastErrorMessage;
    return $this;
  }

  public function setLastSynchronizationErrorDate(?int $lastSynchronizationErrorDate): WebhookInfo
  {
    $this->last_synchronization_error_date = $lastSynchronizationErrorDate;
    return $this;
  }

  public function setMaxConnections(?int $maxConnections): WebhookInfo
  {
    $this->max_connections = $maxConnections;
    return $this;
  }

  public function setAllowedUpdates(?array $allowedUpdates): WebhookInfo
  {
    $this->allowed_updates = $allowedUpdates;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
