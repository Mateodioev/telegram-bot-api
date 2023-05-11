<?php

namespace Mateodioev\Bots\Telegram;

use Exception;
use Mateodioev\Bots\Telegram\Methods\Method;
use Mateodioev\Bots\Telegram\Types\Response;
use Mateodioev\Utils\Exceptions\FileException;

use function is_dir, mkdir, error_reporting, ini_set, date, error_log, strtoupper, implode;

class TelegramLogger
{
  public static string $file_log = '';
  public static bool $active = true;
  
  /**
   * Activate internal php log
   * @throws FileException
   */
  public static function Activate(string $dir = __DIR__): void
  {
    if (!is_dir($dir)) {
      try {
        mkdir($dir, 0777, true);
      } catch (Exception) {
        throw new FileException('Error creating directory ' . $dir);
      }
    }

    error_reporting(E_ALL);
    ini_set('display_errors', false);
    ini_set('log_errors', true);
    self::$file_log = $dir . DIRECTORY_SEPARATOR . date('Y-m-d') . '-php_error.log';
    ini_set('error_log', self::$file_log);
  }

  /**
   * Log a message in telegram channel, if the message not send log in file
   */
  private static function Send(string $content, string $level, ?string $channel=null): void
  {
    $payload = ['chat_id' => $channel ?? $_ENV['CHANNEL_LOG'], 'text' => $level . ' log: ' . $content ];
    /** @var Response $res */
    $res = Api::FromEnv()->request(Method::create($payload, 'sendMessage'));

    if (!$res->ok) {
      error_log('Fail to log "' . $content . '", error: ' . $res->description);
    }
  }

  /**
   * Send log message to channel and save in log file with format
   */
  public static function __callStatic($level, $arguments)
  {
    if (!self::$active) return;
    
    $level = strtoupper($level);
    $msg = implode(PHP_EOL, $arguments);
    error_log('[' . $level . '] ' . $msg);
    self::Send($msg, $level, $_ENV['CHANNEL_LOG']);
  }
}
