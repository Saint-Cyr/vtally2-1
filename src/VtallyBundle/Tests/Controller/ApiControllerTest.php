<?php

namespace VtallyBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testPostFront()
    {
        $client = static::createClient();
        $data = 'some thing';
        $crawler = $client->request('POST', 'api/fronts', array($data));
        
        $_json = array('firstName' => 'Saint-Cyr', 'pollingStation' => 'Pol1');
        $_json = json_encode($_json);
        
        $json1 = $client->getResponse();
        
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
        $this->assertEquals($json1->getContent(), $_json);
       
        
    }
}
