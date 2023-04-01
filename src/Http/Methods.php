<?php

namespace Mateodioev\Bots\Telegram\Http;

/**
 * Common HTTP methods
 */
enum Methods: string {
    case GET = 'GET';
    case POST = 'POST';

    public function value(): string
    {
        return $this->value;
    }
}
