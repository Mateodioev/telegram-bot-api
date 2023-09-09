<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\{Error, InputFile, Update, WebhookInfo};
use Mateodioev\Utils\Network;

/**
 * @see https://core.telegram.org/bots/api#getting-updates
 */
trait gettingUpdates
{

    /**
     * Use this method to receive incoming updates using long polling. Returns an Array of Update objects.
     *
     * @see https://core.telegram.org/bots/api#getupdates
     * @return Update[]|Error Array of Update objects
     */
    public function getUpdates(int $offset = 0, int $limit = 100, $timeout = 0, array $allowedUpdates = []): TypesInterface|array
    {
        $payload = [
            'offset'          => $offset,
            'limit'           => $limit,
            'timeout'         => $timeout,
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
     *
     * @see https://core.telegram.org/bots/api#setwebhook
     */
    public function setWebhook(string $url, ?InputFile $certificate = null, array $params = []): TypesInterface
    {
        if (!Network::IsValidUrl($url)) {
            throw new TelegramParamException('Invalid webhook URL');
        }

        return $this->request(
            Method::create(['url' => $url, 'certificate' => $certificate?->get(), ...$params])
                ->setMethod('setWebhook')
        );
    }

    /**
     * Use this method to remove webhook integration if you decide to switch back to getUpdates.
     *
     * @see https://core.telegram.org/bots/api#deletewebhook
     */
    public function deleteWebhook(bool $dropUpdates = false): TypesInterface
    {
        return $this->request(Method::create(['drop_pending_updates' => $dropUpdates], 'deleteWebhook'));
    }

    /**
     * Describes the current status of a webhook.
     *
     * @see https://core.telegram.org/bots/api#webhookinfo
     * @return WebhookInfo
     */
    public function getWebhookInfo(): TypesInterface
    {
        return $this->request(Method::create([], 'getWebhookInfo')
            ->setReturnType(WebhookInfo::class));
    }
}