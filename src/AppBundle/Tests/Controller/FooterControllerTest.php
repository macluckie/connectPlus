<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FooterControllerTest extends WebTestCase
{
    public function testGetphonenumber()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getPhoneNumber');
    }
}
