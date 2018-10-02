<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FormResaControllerTest extends WebTestCase
{
    public function testFormresa()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/formResa');
    }
}
