# Telegram bot api

## Install

```bash
composer require mateodioev/tgbot
```

```bash
git clone https://github.com/Mateodioev/tgbot
```

## First step

```php
require __DIR__ . 'path/to/vendor/autoload.php';
```

## Create new Api instance

```php
use Mateodioev\Bots\Telegram\Api;

$api = new Api($bot_token);
```


## Send method to telegram api

```php
use Mateodioev\Bots\Telegram\Types\Message;

$message = $api->sendMessage('chat_id', 'Text', $others_params);

var_dump($message->get());
var_dump($message instanceof Message::class);
```
