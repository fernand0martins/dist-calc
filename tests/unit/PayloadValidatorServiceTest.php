<?php
declare(strict_types=1);

namespace App\Tests\Unit;

use App\Http\Services\PayloadValidatorService;
use Respect\Validation\Exceptions\KeySetException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class PayloadValidatorServiceTest
 *
 * @author Fernando Martins
 * @package App\Tests\Unit
 */
class PayloadValidatorServiceTest extends WebTestCase
{
    private const VALID_PAYLOAD = [
        'values' => [
            'distance1' => [
                'value' => 1.1,
                'unit' => 'meters'
            ],
            'distance2' => [
                'value' => 0.5,
                'unit' => 'yards'
            ]
        ],
        'response_unit' => 'meters'
    ];

    /**
     * Tests a not valid payload to calculate a distance
     */
    public function testValidateDistanceCalculatorPayloadNotValid(): void
    {
        $payloadValidatorService = new PayloadValidatorService();

        $this->expectException(KeySetException::class);
        $payloadValidatorService->validatePayload(['not_valid']);
    }

    /**
     * Tests a valid payload to calculate a distance
     */
    public function testValidateDistanceCalculatorPayloadValid(): void
    {
        $payloadValidatorService = new \App\Http\Services\PayloadValidatorService();
        $payloadValidatorService->validatePayload(self::VALID_PAYLOAD);

        //we expect it to pass, otherwise it will fail before the assert true
        $this->assertTrue(true);
    }
}
