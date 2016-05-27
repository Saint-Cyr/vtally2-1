<?php

namespace PrBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PresidentialControllerTest extends WebTestCase
{
    public function testNational()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pr/national');
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
    }

    public function testRegion()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pr/region/1');
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
    }

    public function testConstituency()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pr/constituency/1');
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
    }

    public function testPollingstation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pr/polling-station/1');
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
        
    }

}
