<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserManagerControllerTest extends WebTestCase
{
    public function testEmail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/dashboard');
    }
}
