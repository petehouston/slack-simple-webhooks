# Simple Slack Webhooks for PHP apps

## Install

```
$ composer require petehouston/slack-simple-webhooks
```

## Usage


```php
use Petehouston\Slack\SlackClient;


$config = [
    'webhookUrl' => '',
    'channel'    => '',
    'username'   => '',
    'icon_emoji' => ''
];

$slack = new SlackClient($config);

$result = $slack->send('This is a test message'); // return true or false on result
```

## License

MIT @ 2018 by [Pete Houston](https://petehouston.com).

