<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\{sendInputFile, Update, User, WebhookInfo};
use Mateodioev\Utils\Network;
use function json_encode;

/**
 * Getting Updates
 * @see https://core.telegram.org/bots/api#getting-updates
 */
trait Updates
{
    /**
     * Use this method to receive incoming updates using long polling. Returns an Array of Update objects.
     * @see https://core.telegram.org/bots/api#getupdates
     */
    public function getUpdates(int $offset = 0, int $limit = 100, $timeout = 0, array $allowedUpdates = []): TypesInterface|array
    {
        $payload = [
            'offset' => $offset,
            'limit' => $limit,
            'timeout' => $timeout,
            'allowed_updates' => json_encode($allowedUpdates)
        ];

        $oldTimeout = $this->timeout;
        $this->timeout = $timeout;

        $result = $this->request(Method::create($payload, 'getUpdates')
            ->setReturnType(Update::class, true));

        $this->timeout = $oldTimeout;
        return $result;
    }

    /**
     * Use this method to specify a URL and receive incoming updates via an outgoing webhook.
     * @see https://core.telegram.org/bots/api#setwebhook
     */
    public function setWebhook(string $url, ?sendInputFile $certificate = null, array $params = []): TypesInterface
    {
        if (!Network::IsValidUrl($url)) {
            throw new TelegramParamException('Invalid webhook URL');
        }

        if ($certificate instanceof sendInputFile) {
            $certificate = $certificate->get();
        }

        return $this->request(Method::create(['url' => $url, 'certificate' => $certificate, ...$params])
            ->setMethod('setWebhook'));
    }

    /**
     * Use this method to remove webhook integration if you decide to switch back to getUpdates.
     * @see https://core.telegram.org/bots/api#deletewebhook
     */
    public function deleteWebhook(bool $dropUpdates = false): TypesInterface
    {
        return $this->request(Method::create(['drop_pending_updates' => $dropUpdates], 'deleteWebhook'));
    }

    /**
     * Describes the current status of a webhook.
     * @see https://core.telegram.org/bots/api#webhookinfo
     */
    public function getWebhookInfo(): TypesInterface
    {
        return $this->request(Method::create([], 'getWebhookInfo')
            ->setReturnType(WebhookInfo::class));
    }

    /**
     * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a User object.
     * @see https://core.telegram.org/bots/api#getme
     */
    public function getMe(): TypesInterface
    {
        return $this->request(Method::create([], 'getMe')
            ->setReturnType(User::class));
    }

    /**
     * Use this method to log out from the cloud Bot API server before launching the bot locally.
     * @see https://core.telegram.org/bots/api#logout
     */
    public function logOut(): TypesInterface
    {
        return $this->request(Method::create([], 'logOut'));
    }

    /**
     * Use this method to close the bot instance before moving it from one local server to another.
     * @see https://core.telegram.org/bots/api#close
     */
    public function close(): TypesInterface
    {
        return $this->request(Method::create([], 'close'));
    }
}

