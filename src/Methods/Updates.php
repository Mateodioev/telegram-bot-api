<?php 

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Types\{sendInputFile, Update, User, WebhookInfo};
use Mateodioev\Utils\Network;
use stdClass;

use function json_encode;

/**
 * Gettings Updates
 */
trait Updates
{
  public function getUpdates(int $offset = 0, int $limit = 100, $timeout = 0, array $allowedUpdates = []): stdClass
  {
    $payload = [
      'offset'          => $offset,
      'limit'           => $limit,
      'timeout'         => $timeout,
      'allowed_updates' => json_encode($allowedUpdates)
    ];

    return $this->request(Method::create($payload)
      ->setMethod('getUpdates')
      ->setReturnType(Update::class, true));
  }

  public function setWebhook(string $url, ?sendInputFile $certificate = null, array $params = []): stdClass
  {
    if (!Network::IsValidUrl($url)) {
      throw new TelegramParamException('Invalid webhook URL');
    }

    return $this->request(Method::create(['url' => $url, 'certificate' => $certificate, ...$params])
      ->setMethod('setWebhook'));
  }

  public function deleteWebhook(bool $dropUpdates = false): stdClass
  {
    return $this->request(Method::create(['drop_pending_updates' => $dropUpdates])
      ->setMethod('deleteWebhook'));
  }

  public function getWebhookInfo(): stdClass
  {
    return $this->request(Method::create()
      ->setMethod('getWebhookInfo')
      ->setReturnType(WebhookInfo::class));
  }

  public function getMe(): stdClass
  {
    return $this->request(Method::create([], 'getMe')
      ->setReturnType(User::class));
  }

  public function logOut(): stdClass
  {
    return $this->request(Method::create([], 'logOut'));
  }

  public function close(): stdClass
  {
    return $this->request(Method::create([], 'close'));
  }
}

