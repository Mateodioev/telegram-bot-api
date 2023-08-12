<?php

namespace Tests\Telegram;

use Mateodioev\Bots\Telegram\Api;
use Mateodioev\Bots\Telegram\Config\Types as ApiConfig;
use Mateodioev\Bots\Telegram\Exception\TelegramApiException;
use Mateodioev\Bots\Telegram\Methods\Method;
use Mateodioev\Bots\Telegram\Types\{Error, User};
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
  private static Api $api;

  public static function setUpBeforeClass(): void
  {
    self::$api = Api::fromEnv();
  }

  private function getInvalidMethod(): Method
  {
    return Method::create(method: 'MyInvalidMethod')
      ->setReturnType(Error::class);
  }

  public function testGetMe()
  {
    $this->assertInstanceOf(User::class, self::$api->getMe());
  }

  public function testAssertTelegramApiException()
  {
    $this->expectException(TelegramApiException::class);
    self::$api->request($this->getInvalidMethod());
  }

  public function testIgnoreExceptionAndAssertError()
  {
    ApiConfig::setThrowExceptionOnFail(false);

    $res = self::$api->request($this->getInvalidMethod());
    $this->assertInstanceOf(Error::class, $res);
  }

  public function testAsyncClient()
  {
    $me = self::$api->setAsync(true)
      ->getMe();

    $this->assertInstanceOf(User::class, $me);
  }

  public function testGetErrorOnInvalidToken()
  {
    $api = new Api('INVALID_BOT_TOKEN');

    $me = $api->getMe();
    $this->assertInstanceOf(Error::class, $me);
  }
}
