<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Http;

use Mateodioev\Request\Methods as RequestMethods;

/**
 * Common HTTP methods
 */
enum Methods: string
{
    case GET  = 'GET';
    case POST = 'POST';

    public function value(): string
    {
        return $this->value;
    }

    public function toRequestMethod(): RequestMethods
    {
        return match ($this) {
            self::GET => RequestMethods::GET,
            self::POST => RequestMethods::POST,
            default => RequestMethods::GET,
        };
    }
}
