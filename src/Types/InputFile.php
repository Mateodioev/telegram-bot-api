<?php 

namespace Mateodioev\Bots\Telegram\Types;

use CURLFile;
use Mateodioev\Bots\Telegram\Exception\InvalidFileException;
use Mateodioev\Utils\{Network, Files};

use function basename;

class InputFile implements TypesInterface
{
  public CURLFile|string $file;
  public array $files;


  public function __construct($file) {
    $this->file = $file;
    $this->files[] = $this;
  }

  /**
   * Upload local file
   */
  public static function fromLocal(string $filePath, ?string $fileName = ''): InputFile
  {
    if (!Files::isFile($filePath)) {
      throw new InvalidFileException('Can\'t find file "' . basename($filePath) . '"');
    }

    $file = new CurlFile($filePath, posted_filename: $fileName);
    return new self($file);
  }

  /**
   * Send external file
   */
  public static function fromUrl(string $url): InputFile
  {
    if (!Network::IsValidUrl($url)) {
      throw new InvalidFileException('Invalid URL');
    }

    return new self($url);
  }

  /**
   * Send a file already exists in telegram servers
   */
  public static function fromId(string $id): InputFile
  {
    if (empty($id)) {
      throw new InvalidFileException('File id cant not be empty');
    }

    return new self($id);
  }

  public function addNewFile(InputFile $file): InputFile
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
