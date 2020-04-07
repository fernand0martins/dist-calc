<?php
declare(strict_types=1);

namespace App\Tests\Unit;

use App\Domain\Distance\Services\DistanceConverterService;
use App\Http\Services\PayloadValidatorService;
use Respect\Validation\Exceptions\KeySetException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DistanceConverterServiceTest
 *
 * @author Fernando Martins
 * @package App\Tests\Unit
 */
class DistanceConverterServiceTest extends WebTestCase
{

    /**
     * Tests a not valid payload to calculate a distance
     */
    public function testConvertDistanceService(): void
    {
        $distanceConvertService = new DistanceConverterService();

        $metersToMeters = $distanceConvertService->convert('meters','meters', 1);
        $this->assertEquals(1, $metersToMeters);

        $yardsToYards = $distanceConvertService->convert('yards','yards', 1);
        $this->assertEquals(1, $yardsToYards);

        $metersToYards = $distanceConvertService->convert('meters','yards', 1);
        $this->assertEquals(1.0936, $metersToYards);

        $yardsToMeters = $distanceConvertService->convert('yards','meters', 1);
        $this->assertEquals( 0.9144, $yardsToMeters);


    }
}
