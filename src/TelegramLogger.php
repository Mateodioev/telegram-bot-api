<?php

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Bots\Telegram\Core;
use Exception;
use Mateodioev\Utils\Exceptions\FileException;

use function is_dir, mkdir, error_reporting, ini_set, date, error_log, strtoupper, implode;

class TelegramLogger
{
  public string $file_log = '';
  
  /**
   * Activate internal php log
   * @throws FileException
   */
  public static function Activate(string $dir = __DIR__)
  {
    if (!is_dir($dir)) {
      try {
        mkdir($dir, 0777, true);
      } catch (Exception $e) {
        throw new FileException('Error creating directory ' . $dir);
      }
    }

    error_reporting(E_ALL);
    ini_set('display_errors', false);
    ini_set('log_errors', true);
    self::$file_log = $dir . '/' . date('Y-m-d') . ' -php_error.log';
    ini_set('error_log', self::$file_log);
  }

  /**
   * Log a message in telegram channel, if the message not send log in file
   */
  private static function Send(string $content, string $level, ?string $channel=null)
  {
    $payload = ['chat_id' => $channel ?? $_ENV['CHANNEL_LOG'], 'text' => $level . ' log: ' . $content ];
    $res = Core::FromEnv()->sendMessage($payload);

    if (!$res->ok) {
      error_log('Fail to log "' . $content . '", error: ' . $res->description);
    }
  }

  /**
   * Send log message to channel and save in log file with format
   */
  public static function __callStatic($level, $arguments)
  {
    $level = strtoupper($level);
    $msg = implode(PHP_EOL, $arguments);
    error_log('[' . $level . '] ' . $msg);
    self::Send($msg, $level, $_ENV['CHANNEL_LOG']);
  }
}
