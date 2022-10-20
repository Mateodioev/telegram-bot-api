<?php 

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Types\InputFile;
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

    return $this->request('getUpdates', $payload);
  }

  public function setWebhook(string $url, ?InputFile $certificate = null, array $params = []): stdClass
  {
    if (!Network::IsValidUrl($url)) {
      throw new TelegramParamException('Invalid webhook URL');
    }

    $payload = ['url' => $url, 'certificate' => $certificate, ...$params];

    return $this->request('setWebhook', $payload);
  }

  public function deleteWebhook(bool $dropUpdates = false): stdClass
  {
    return $this->request('deleteWebhook', [
      'drop_pending_updates' => $dropUpdates
    ]);
  }

  public function getWebhookInfo(): stdClass
  {
    return $this->request('getWebhookInfo');
  }

  public function getMe(): stdClass
  {
    return $this->request('getMe');
  }
}

