<?php

namespace Tests\Telegram;

use Mateodioev\Bots\Telegram\Api;
use Mateodioev\Bots\Telegram\Config\Types as ApiConfig;
use Mateodioev\Bots\Telegram\Exception\{TelegramApiException, TelegramParamException};
use Mateodioev\Bots\Telegram\Methods\Method;
use Mateodioev\Bots\Telegram\Types\{Document, Error, InputFile, InputMediaDocument, Message, User};
use Mateodioev\Bots\Telegram\Types\Update;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    private static Api $api;

    public static function setUpBeforeClass(): void
    {
        if (!isset($_ENV['BOT_TOKEN']) || empty($_ENV['BOT_TOKEN'])) {
            self::markTestSkipped('BOT_TOKEN not found in env');
        }

        self::getApi();
    }

    public static function getApi(): Api
    {
        return Api::fromEnv();
    }

    protected function setUp(): void
    {
        if (!isset($_ENV['BOT_TOKEN']) || empty($_ENV['BOT_TOKEN'])) {
            $this->markTestSkipped('BOT_TOKEN not found in env');
        }
    }

    private function getInvalidMethod(): Method
    {
        return Method::create(method: 'MyInvalidMethod')
            ->setReturnType(Error::class);
    }

    public function testGetUpdates()
    {
        $updates = self::getApi()->getUpdates();
        $this->assertIsArray($updates);

        foreach ($updates as $update) {
            $this->assertInstanceOf(Update::class, $update);
        }
    }

    public function testGetMe()
    {
        $this->assertInstanceOf(User::class, self::getApi()->getMe());
    }

    public function testAssertTelegramApiException()
    {
        $this->expectException(TelegramApiException::class);
        self::getApi()->request($this->getInvalidMethod());
    }

    public function testIgnoreExceptionAndAssertError()
    {
        ApiConfig::setThrowExceptionOnFail(false);

        $res = self::getApi()->request($this->getInvalidMethod());
        $this->assertInstanceOf(Error::class, $res);
    }

    public function testAsyncClient()
    {
        $me = self::getApi()->setAsync(true)
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
        $message = self::getApi()->sendDocument(
            chatID: $_ENV['TELEGRAM_CHAT_ID'],
            document: InputFile::fromLocal(__DIR__ . '/test.txt', 'test.txt')
        );

        $this->assertInstanceOf(Message::class, $message);
        $this->assertInstanceOf(Document::class, $message->document);
    }

    public function testAsyncSendFile()
    {
        $message = self::getApi()
            ->setAsync(true)
            ->sendDocument(
                chatID: $_ENV['TELEGRAM_CHAT_ID'],
                document: InputFile::fromLocal(__DIR__ . '/test.txt', 'test.txt')
            );

        $this->assertInstanceOf(Message::class, $message);
        $this->assertInstanceOf(Document::class, $message->document);
    }

    public function testSendMultipleFiles()
    {
        $media = InputMediaDocument::default()->setMedia('https://github.githubassets.com/favicons/favicon.png');

        $messages = self::getApi()->sendMediaGroup(
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

    public function testAsyncSendMultipleFiles()
    {
        $media = InputMediaDocument::default()->setMedia('https://github.githubassets.com/favicons/favicon.png');

        $messages = self::getApi()->setAsync(true)->sendMediaGroup(
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

        self::getApi()->sendMediaGroup(
            chatID: $_ENV['TELEGRAM_CHAT_ID'],
            media: [$media]
        );
    }
}
