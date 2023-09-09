<?php

namespace Mateodioev\Bots\Telegram\Inline;

use Mateodioev\Bots\Telegram\Types\InlineQueryResult;
use Mateodioev\Bots\Telegram\Types\InlineQueryResultCachedAudio;

class InlineQueryResultsFactory
{
    /** @var int Total results in InlineQueryResult */
    private int $count = 0;

    /** @var InlineQueryResult[] Results */
    public array $results = [];

    /**
     * Add new InlineQueryResult to results.
     */
    public function add(InlineQueryResult $result): static
    {
        $this->results[] = $result;
        $this->count++;

        return $this;
    }

    /**
     * Add new InlineQueryResultCachedAudio to results.
     */
    public function cachedAudio(): static
    {
        return $this->add(
            InlineQueryResultCachedAudio::default()
        );
    }
}