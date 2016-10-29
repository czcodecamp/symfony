<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FaqControllerTest extends WebTestCase
{
    public function testReadfaqs()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/faqs');
    }

}
