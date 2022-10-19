<?php 

namespace Mateodioev\Bots\Telegram\Types;

use CURLFile;
use Mateodioev\Bots\Telegram\Exception\InvalidFileException;
use Mateodioev\Utils\{Network, Files};

use function basename;

class InputFile implements TypesInterface
{
  public CURLFile|string $file;

  public function __construct($file) {
    $this->file = $file;
  }

  public static function fromLocal(string $filePath, ?string $fileName = ''): InputFile
  {
    if (!Files::isFile($filePath)) {
      throw new InvalidFileException('Can\'t find file "' . basename($filePath) . '"');
    }

    $file = new CurlFile($filePath, posted_filename: $fileName);
    return new self($file);
  }

  public function fromUrl(string $url): InputFile
  {
    if (!Network::IsValidUrl($url)) {
      throw new InvalidFileException('Invalid URL');
    }

    return new self($url);
  }

  public function get()
  {
    return $this->file;
  }
}
