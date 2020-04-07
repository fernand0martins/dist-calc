<?php
declare(strict_types=1);

namespace App\Http\Controller;

use App\Domain\Distance\Services\DistanceConverterService;
use App\Http\Services\PayloadValidatorService;
use Respect\Validation\Exceptions\ComponentException;
use Respect\Validation\Exceptions\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class DistanceCalculatorController
 *
 * @author Fernando Martins
 * @package App\Controller
 */
class DistanceCalculatorController
{
    private const USAGE_EXAMPLE = [
        'values' => [
            'distance1' => [
                'value' => 'YOUR_VALUE_HERE-[float]',
                'unit' => 'YOUR_UNIT_HERE-[meters/yards]'
            ],
            'distance2' => [
                'value' => 'YOUR_VALUE_HERE-[float]',
                'unit' => 'YOUR_UNIT_HERE-[meters/yards]'
            ]
        ],
        'response_unit' => 'YOUR_RESPONSE_UNIT_HERE-[meters/yards]'
    ];
    private const CONTENT_TYPE = 'Content-Type';
    private const APPLICATION_JSON = 'application/json';

    /** @var PayloadValidatorService */
    private $distanceValidatorService;

    /** @var DistanceConverterService */
    private $distanceConverterService;

    /**
     * DistanceCalculatorController constructor.
     * @param PayloadValidatorService $distanceValidatorService
     * @param DistanceConverterService $distanceConverterService
     */
    public function __construct(
        PayloadValidatorService $distanceValidatorService,
        DistanceConverterService $distanceConverterService
    ) {
        $this->distanceValidatorService = $distanceValidatorService;
        $this->distanceConverterService = $distanceConverterService;
    }

    /**
     * @return Response
     */
    public function usage(): Response
    {
        return new JsonResponse(self::USAGE_EXAMPLE);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function calculate(Request $request): Response
    {
        $payload = json_decode((string)$request->getContent(), true);

        if ($payload === null) {
            return $this->Response(['message' => 'empty body']);
        }

        try {
            $this->distanceValidatorService->validatePayload($payload);
        } catch (ValidationException|ComponentException $validationException) {
            return $this->Response([$validationException->getMessage()]);
        }


        //todo calculate the distance
        return $this->Response(['todo']);
    }

    /**
     * @param array $contents
     * @return Response
     */
    private function Response(array $contents): Response
    {
        $response = new Response(json_encode($contents));
        $response->headers->set(self::CONTENT_TYPE, self::APPLICATION_JSON);

        return $response;
    }
}
