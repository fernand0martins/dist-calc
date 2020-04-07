<?php
declare(strict_types=1);

namespace App\Domain\Distance\Services;

/**
 * Class DistanceConverterService
 *
 * @author Fernando Martins
 * @package App\Services
 */
class DistanceConverterService
{
    /**
     * Convert a distance value between meters and yards
     * @param string $originalUnit
     * @param string $convertedUnit
     * @param float $value
     * @return float
     * @throws \Exception
     */
    public function convert(string $originalUnit, string $convertedUnit, float $value): float{
        if($originalUnit === $convertedUnit){
            return $value;
        }

        switch($originalUnit){
            case 'meters':
                return round($value * 1.09361,4);
            case 'yards':
                return round($value * 0.9144,4);
            default:
                //this should never happen, but just in case
                throw new \Exception('Expected meters or yards');
        }
    }
}
