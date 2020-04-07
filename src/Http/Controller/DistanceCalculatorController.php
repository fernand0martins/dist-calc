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


use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class DistanceCalculatorController
 *
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

    /**
     * Shows a example of the object that can be used in the POST operation
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns a example of the post object",
     *
     * )
     * @SWG\Tag(name="Example")
     */
    public function usage(): Response
    {
        return new JsonResponse(self::USAGE_EXAMPLE);
    }

    /**
     * Calculates the sum of two distances
     *
     * @SWG\Response(
     *     response=200,
     *     description="Receives two distances and sums them",
     *
     * )
     * @SWG\Parameter(
     *   name="body",
     *   in="body",
     *   @SWG\Schema(
     *     type="object",
     *     @SWG\Property(property="values", type="object",
     *        @SWG\Property(property="distance1",type="object",
     *          @SWG\Property(property="value",type="float"),
     *          @SWG\Property(property="unit",type="string")
     *        ),
     *     @SWG\Property(property="distance2",type="object",
     *          @SWG\Property(property="value",type="float"),
     *          @SWG\Property(property="unit",type="string")
     *        )
     *     ),
     *     @SWG\Property(property="response_unit", type="string")
     *   )
     * )
     * @SWG\Tag(name="Sum distances")
     *
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
