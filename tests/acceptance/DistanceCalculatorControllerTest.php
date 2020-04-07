<?php
declare(strict_types=1);

namespace App\Tests\Acceptance;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DistanceCalculatorControllerTest
 *
 * @author Fernando Martins
 */
class DistanceCalculatorControllerTest extends WebTestCase
{
    /**
     * Test if the endpoint is returning a valid response
     */
    public function testCalculateDistanceUsage(): void
    {
        $client = static::createClient();

        $client->request('GET', '/distance-calculator');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test if the endpoint is returning a valid response
     */
    public function testCalculateDistanceCalculate(): void
    {
        $client = static::createClient();

        $client->request('POST', '/distance-calculator');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
