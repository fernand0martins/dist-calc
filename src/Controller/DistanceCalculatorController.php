<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class DistanceCalculatorController
 *
 * @author Fernando Martins
 * @package App\Controller
 */
class DistanceCalculatorController extends AbstractController
{
    private const USAGE_EXAMPLE = [
        'values' => [
            'distance1' => [
                'value' => 'YOUR_VALUE_HERE',
                'unit' => 'YOUR_UNIT_HERE'
            ],
            'distance2' => [
                'value' => 'YOUR_VALUE_HERE',
                'unit' => 'YOUR_UNIT_HERE'
            ]
        ],
        'response_unit' => 'YOUR_RESPONSE_UNIT_HERE'
    ];

    /**
     * @return Response
     */
    public function usage(): Response
    {
        return new JsonResponse(self::USAGE_EXAMPLE);
    }

    /**
     *
     * @return Response
     */
    public function calculate(): Response
    {
        //todo calculate the distance
        return new JsonResponse(['todo']);
    }
}
