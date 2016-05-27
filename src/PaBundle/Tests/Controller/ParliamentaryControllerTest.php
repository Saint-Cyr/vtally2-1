<?php
/*
 * This file is part of Components of VTALLY2 project
 * contributor(s): Saint-Cyr MAPOUKA
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace PaBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ParliamentaryControllerTest extends WebTestCase
{
    public function testNational()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pa/national');
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
    }

    public function testRegion()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pa/region/1');
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
    }

    public function testConstituency()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pa/constituency/1');
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
    }

    public function testPollingstation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'pa/polling-station/1');
        $this->assertEquals($client->getResponse()->getStatusCode(), 200);
    }

}
