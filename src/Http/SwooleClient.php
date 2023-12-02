<?php

namespace Mateodioev\Bots\Telegram\Http;

use OpenSwoole\Coroutine\HTTP\Client;

use function parse_url;

/**
 * Swoole HTTP client
 * NOTE: This need Swoole extension installed and placed inside a coroutine
 *
 * @see https://www.swoole.co.uk/docs/modules/swoole-coroutine-http-client
 */
class SwooleClient implements Request
{
    public const DEFAULT_TIMEOUT = 10;

    private Client $client;
    private string $path;

    public function __construct()
    {
        if (
            extension_loaded('openswoole') === false
            || class_exists(Client::class) === false
        ) {
            throw new HttpException('Swoole extension not loaded');
        }
    }

    public function new(string $url, mixed $payload = null, Methods $method = Methods::POST): static
    {
        // remove "/" from the end
        [$host, $path] = $this->parseUrl(rtrim($url, '/'));
        $this->path = $path;

        $this->client = new Client($host, 443, true);
        $this->client->setHeaders([
            'Host' => $host,
            'User-Agent' => 'Mateodioev/TelegramBot',
            'Content-Type' => 'application/json',
        ]);
        $this->client->setMethod($method->value());

        if (!empty($payload)) {
            $this->client->setData($payload);
        }

        $this->setTimeout();

        return $this;
    }

    private function parseUrl(string $url): array
    {
        $urlInfo = parse_url($url);
        return [$urlInfo['host'], $urlInfo['path']];
    }

    public function setTimeout(int $timeout = self::DEFAULT_TIMEOUT): static
    {
        $this->client->set(['timeout' => $timeout]);
        return $this;
    }

    public function run(): Response
    {
        $status = $this->client->execute($this->path);
        $body   = $this->client->getBody();

        $this->client->close();

        if ($status === false) {
            throw new HttpException('Error: ' . $this->client->errMsg);
        } else {
            return new Response($body);
        }
    }

    public function isAsync(): bool
    {
        // Swoole always is async
        return true;
    }

    public function download(string $path, string $destination): bool
    {
        $this->client->setHeaders([
            'Content-Type' => '',
            'Accept-Encoding' => 'gzip',
        ]);

        $status = $this->client->download($path, $destination);
        $this->client->close();

        return $status;
    }
}
