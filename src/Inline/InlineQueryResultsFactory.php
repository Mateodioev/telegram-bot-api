<?php

namespace Mateodioev\Bots\Telegram\Inline;

use Mateodioev\Bots\Telegram\Config\foreachable;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Types\{
    InlineQueryResult,
    InlineQueryResultCachedAudio,
    InlineQueryResultCachedDocument
};

class InlineQueryResultsFactory extends foreachable
{
    const MAX_RESULTS = 50;

    /** @var InlineQueryResult[] Results */
    public array $results = [];

    /**
     * Add new InlineQueryResult to results.
     */
    public function add(InlineQueryResult $result): static
    {
        if (\count($this->results) > self::MAX_RESULTS)
            throw new TelegramParamException('Exceeded maximum number of results');
        if ($result::class === InlineQueryResult::class)
            throw new TelegramParamException('Invalid inline query result type');

        $this->results[] = $result;

        return $this;
    }

    public function total(): int
    {
        return \count($this->results);
    }

    /**
     * Get all results
     *
     * @return InlineQueryResult[]
     */
    public function all(): array
    {
        return $this->results;
    }

    /**
     * Convert results to json-serialized object.
     */
    public function toJson(): string
    {
        $results = \array_map(fn (InlineQueryResult $result) => $result->getReduced(), $this->all());

        return \json_encode($results);
    }

    /**
     * Add new InlineQueryResultCachedAudio to results.
     */
    public function cachedAudio(string $id, string $audioFileID, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedAudio::default()
                ->setId($id)
                ->setAudioFileId($audioFileID)
                ->magicSetter($params)
        );
    }

    public function cachedDocument(string $id, string $title, string $documentFileID, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedDocument::default()
                ->setId($id)
                ->setTitle($title)
                ->setDocumentFileId($documentFileID)
                ->magicSetter($params)
        );
    }

    protected function getArray(): array
    {
        return $this->results;
    }
}