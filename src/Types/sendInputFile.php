<?php 

namespace Mateodioev\Bots\Telegram\Types;

use CURLFile;
use Mateodioev\Bots\Telegram\Exception\InvalidFileException;
use Mateodioev\Utils\{Network, Files};

use function basename, realpath, mime_content_type;

class sendInputFile
{
  public CURLFile|string $file;
  public array $files;


  public function __construct($file) {
    $this->file = $file;
    $this->files[] = $this;
  }

  public static function create(string $file)
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
  public static function fromLocal(string $filePath, ?string $fileName = ''): sendInputFile
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
  public static function fromUrl(string $url): sendInputFile
  {
    if (!Network::IsValidUrl($url)) {
      throw new InvalidFileException('Invalid URL');
    }

    return new self($url);
  }

  /**
   * Send a file already exists in telegram servers
   */
  public static function fromId(string $id): sendInputFile
  {
    if (empty($id)) {
      throw new InvalidFileException('File id cant not be empty');
    }

    return new self($id);
  }

  public function addNewFile(sendInputFile $file): sendInputFile
  {
    $this->files[] = $file;
    return $this;
  }

  public function getFiles(): array
  {
    return $this->files;
  }

  public function get()
  {
    return $this->file;
  }
}
