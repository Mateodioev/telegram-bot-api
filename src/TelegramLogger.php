<?php

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Bots\Telegram\Core;
use Exception;
use function is_dir;
use function mkdir;
use function error_reporting;
use function ini_set;

class TelegramLogger
{
  /**
   * Activate internal php log
   */
  public static function Activate(string $dir = __DIR__)
  {
    if (!is_dir($dir)) {
      try {
        mkdir($dir, 0777, true);
      } catch (Exception $e) {
        throw new Exception('Error creating directory ' . $dir);
      }
    }

    error_reporting(E_ALL);
    ini_set('display_errors', false);
    ini_set('log_errors', true);
    $file_name = $dir . '/' . date('Y-m-d') . ' -php_error.log';
    ini_set('error_log', $file_name);
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

  public static function __callStatic($level, $arguments)
  {
    $level = strtoupper($level);
    $msg = implode(PHP_EOL, $arguments);
    error_log('[' . $level . '] ' . $msg);
    self::Send($msg, $level, $_ENV['CHANNEL_LOG']);
  }
}
