<?php

namespace VtallyBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function login()
    {
        $client = static::createClient();
        $data = array('action' => 1, 'username' => 'super-admin', 'password' => 'test');
        $crawler = $client->request('POST', 'api/fronts', array($data));
        
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
        $this->assertEquals($json1->getContent(), $_json);
    }
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
