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

## Enable async mode

Note: This use `amphp/http-client`

```php
$api->setAsync(true);
```

## Create new telegram types

```php
use Mateodioev\Bots\Telegram\Types\baseType;

class MyCustomType extends baseType
{
    protected array $fields = [
        'field1' => 'valueType',
        'id'     => 'integer', // only accept integer values
        'user'   => User::class, // only accept arrays or instances of the User class
    ];
}
```

*Create new instance*

```php
// from array
$customType = MyCustomType::createFromArray(['field1' => 'Type', 'id' => 1111, 'user' => $user]);
// From stdClass
$customType = MyCustomType::create((object) ['field1' => 'Type', 'id' => 1111, 'user' => $user]);
// Create from constructor
$customType = new MyCustomType(field1: 'Type', id: 1111, user: $user); // maybe this cause linter errors
```
