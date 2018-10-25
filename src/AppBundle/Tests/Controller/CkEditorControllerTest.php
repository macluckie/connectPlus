<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CkEditorControllerTest extends WebTestCase
{
    public function testCreateform()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createForm');
    }
}
