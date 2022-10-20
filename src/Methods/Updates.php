<?php 

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Types\InputFile;
use Mateodioev\Utils\{fakeStdClass, Network};

use function json_encode;

/**
 * Gettings Updates
 */
trait Updates
{
  public function getUpdates(int $offset = 0, int $limit = 100, $timeout = 0, array $allowedUpdates = []): fakeStdClass
  {
    $payload = [
      'offset'          => $offset,
      'limit'           => $limit,
      'timeout'         => $timeout,
      'allowed_updates' => json_encode($allowedUpdates)
    ];

    return $this->request('getUpdates', $payload);
  }

  public function setWebhook(string $url, ?InputFile $certificate = null, array $params = []): fakeStdClass
  {
    if (!Network::IsValidUrl($url)) {
      throw new TelegramParamException('Invalid webhook URL');
    }

    $payload = ['url' => $url, 'certificate' => $certificate, ...$params];

    return $this->request('setWebhook', $payload);
  }

  public function deleteWebhook(bool $dropUpdates = false): fakeStdClass
  {
    return $this->request('deleteWebhook', [
      'drop_pending_updates' => $dropUpdates
    ]);
  }

  public function getWebhookInfo(): fakeStdClass
  {
    return $this->request('getWebhookInfo');
  }

  public function getMe(): fakeStdClass
  {
    return $this->request('getMe');
  }
}

