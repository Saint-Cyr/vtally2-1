<?php

namespace PaBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ParliamentaryControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pa/national');
        $this->assertTrue($client->getResponse()->isSuccessful());
        
        $crawler = $client->request('GET', '/pa/region/1');
        $this->assertTrue($client->getResponse()->isSuccessful());
        
        //make sure the region id is integer
        $crawler = $client->request('GET', '/pa/region/c');
        $this->assertNotTrue($client->getResponse()->isSuccessful());
        
        $crawler = $client->request('GET', '/pa/constituency/1');
        $this->assertTrue($client->getResponse()->isSuccessful());
        
        //make sure the region id is integer
        $crawler = $client->request('GET', '/pa/constituency/c');
        $this->assertNotTrue($client->getResponse()->isSuccessful());
        
        $crawler = $client->request('GET', '/pa/polling-station/1');
        $this->assertTrue($client->getResponse()->isSuccessful());
        
        //make sure the region id is integer
        $crawler = $client->request('GET', '/pa/polling-station/c');
        $this->assertNotTrue($client->getResponse()->isSuccessful());
    }
}
