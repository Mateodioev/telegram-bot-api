<?php

namespace Tests\Http;

use Mateodioev\Bots\Telegram\Api;
use Mateodioev\Bots\Telegram\Http\SwooleClient;
use PHPUnit\Framework\TestCase;

class SwooleClientTest extends TestCase
{
    protected function setUp(): void
    {
        if (extension_loaded('openswoole') === false) {
            $this->markTestSkipped('Not found swoole extension');
        }
    }

    public function testCreateClient()
    {
        $client = new SwooleClient();
        $this->assertInstanceOf(SwooleClient::class, $client);

        $api = new Api($_ENV['BOT_TOKEN']);

        $this->assertInstanceOf(Api::class, $api->setClient($client));
    }
}
