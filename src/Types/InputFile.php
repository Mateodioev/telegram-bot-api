<?php

namespace Mateodioev\Bots\Telegram\Types;

use CURLFile;
use Mateodioev\Bots\Telegram\Exception\InvalidFileException;
use Mateodioev\Utils\{Network, Files};

use function basename;
use function realpath;
use function mime_content_type;
use function filesize;

/**
 * Use this object to send files to Telegram.
 *
 * @see https://core.telegram.org/bots/api#sending-files
 */
class InputFile
{
    public function __construct(
        public CURLFile|string $file
    ) {
    }

    public static function create(string $file): self
    {
        if (Files::isFile($file)) {
            return self::fromLocal($file);
        } elseif (Network::IsValidUrl($file)) {
            return self::fromUrl($file);
        } elseif (!empty($file)) {
            return self::fromId($file);
        } else {
            throw new InvalidFileException('Invalid file');
        }
    }

    /**
     * Upload local file
     */
    public static function fromLocal(string $filePath, ?string $fileName = ''): self
    {
        if (!Files::isFile($filePath)) {
            throw new InvalidFileException('Can\'t find file "' . basename($filePath) . '"');
        }

        $file = new CurlFile(realpath($filePath), mime_content_type($filePath), $fileName);
        return new self($file);
    }

    /**
     * Send external file
     */
    public static function fromUrl(string $url): self
    {
        if (!Network::IsValidUrl($url)) {
            throw new InvalidFileException('Invalid URL');
        }

        return new self($url);
    }

    /**
     * Send a file already exists in telegram servers
     */
    public static function fromId(string $id): self
    {
        if (empty($id)) {
            throw new InvalidFileException('File id cant not be empty');
        }

        return new self($id);
    }

    public function get(): CURLFile|string
    {
        return $this->file;
    }

    public function size(): ?int
    {
        if ($this->file instanceof CURLFile) {
            return filesize($this->file->getFilename());
        }
        return null;
    }
}
