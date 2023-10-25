<?php

namespace Tests\Telegram;

use Mateodioev\Bots\Telegram\Api;
use Mateodioev\Bots\Telegram\Config\Types as ApiConfig;
use Mateodioev\Bots\Telegram\Exception\TelegramApiException;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Methods\Method;
use Mateodioev\Bots\Telegram\Types\{Document, Error, InputFile, InputMediaDocument, Message, User};
use Mateodioev\Bots\Telegram\Types\Update;
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

    public function testGetUpdates()
    {
        $updates = self::$api->getUpdates();
        $this->assertIsArray($updates);

        foreach ($updates as $update) {
            $this->assertInstanceOf(Update::class, $update);
        }
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

    public function testSendFile()
    {
        $message = self::$api->sendDocument(
            chatID: $_ENV['TELEGRAM_CHAT_ID'],
            document: InputFile::fromLocal(__DIR__ . '/test.txt', 'test.txt')
        );

        $this->assertInstanceOf(Message::class, $message);
        $this->assertInstanceOf(Document::class, $message->document);
    }

    public function testSendMultipleFiles()
    {
        $media = InputMediaDocument::default()->setMedia('https://github.githubassets.com/favicons/favicon.png');

        $messages = self::$api->sendMediaGroup(
            chatID: $_ENV['TELEGRAM_CHAT_ID'],
            media: [
            $media,
            $media
      ]
        );

        $this->assertIsArray($messages);
        $this->assertCount(2, $messages);
        foreach ($messages as $message) {
            $this->assertInstanceOf(Message::class, $message);
        }
    }

    public function testSendInvalidMediaCount()
    {
        $media = InputMediaDocument::default()->setMedia('https://github.githubassets.com/favicons/favicon.png'); // Not supported local files

        $this->expectException(TelegramParamException::class);
        $this->expectExceptionMessage('Media group must have at least 2 and at most 10 items');

        self::$api->sendMediaGroup(
            chatID: $_ENV['TELEGRAM_CHAT_ID'],
            media: [$media]
        );
    }
}
