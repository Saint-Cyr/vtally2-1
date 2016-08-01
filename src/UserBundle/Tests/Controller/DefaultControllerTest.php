<?php

namespace UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testOnlineusers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/onlineUsers');
    }

}
