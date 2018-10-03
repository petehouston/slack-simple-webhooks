<?php

namespace Petehouston\Slack;

use PHPUnit\Framework\TestCase;

class SlackClientTest extends TestCase
{
    private $config = [];

    protected function setUp()
    {
        parent::setUp();

        $this->config = [
            'webhookUrl' => '', // Provide this webhook URL
            'channel'    => '#test-slack',
            'username'   => 'reporter',
            'icon_emoji' => ':ghost:'
        ];
    }


    public function testSlackClient()
    {
        $slack = new SlackClient($this->config);
        $result = $slack->send('Another alert XX');

        $this->assertTrue($result);
    }
}
