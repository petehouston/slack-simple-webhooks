<?php

namespace Petehouston\Slack;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SlackClient
{
    private $config = [];

    private $webClient;

    public function __construct($config)
    {
        $this->config = [
            'webhookUrl' => $config['webhookUrl'],
            'channel'    => $config['channel'],
            'username'   => $config['username'],
            'icon_emoji' => $config['icon_emoji']
        ];

        $this->webClient = new Client([
            'base_uri' => $config['webhookUrl']
        ]);
    }

    public function send(string $message)
    {
        $payload = [
            'channel'    => $this->config['channel'],
            'username'   => $this->config['username'],
            'text'       => $message,
            'icon_emoji' => $this->config['icon_emoji']
        ];

        try {
            $response = $this->webClient->request(
                'POST',
                $this->config['webhookUrl'],
                [
                    'form_params' => [
                        'payload' => json_encode($payload)
                    ]
                ]
            );
        } catch (GuzzleException $e) {
            return false;
        }

        return $response->getStatusCode() === 200 && $response->getBody()->getContents() === 'ok';
    }
}
