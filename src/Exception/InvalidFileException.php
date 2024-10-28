<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Exception;

use Mateodioev\Utils\Exceptions\ExceptionInterface;

final class InvalidFileException extends TelegramException implements ExceptionInterface
{
}
