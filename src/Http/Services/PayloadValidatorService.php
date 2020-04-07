<?php
declare(strict_types=1);

namespace App\Http\Services;

use Respect\Validation\Exceptions\ComponentException;
use Respect\Validation\Rules\FloatVal;
use Respect\Validation\Rules\In;
use Respect\Validation\Rules\Key;
use Respect\Validation\Rules\KeySet;

/**
 * Class PayloadValidatorService
 *
 * @author Fernando Martins
 * @package App\Services
 */
class PayloadValidatorService
{
    private const AVAILABLE_UNITS = ['meters', 'yards'];

    /**
     * @param array $payload
     * @throws ComponentException
     */
    public function validatePayload(array $payload): void
    {
        $floatValidator = new FloatVal();
        $unitsValidator = new In(self::AVAILABLE_UNITS);

        $distanceValidator = new KeySet(
            new Key('value',  $floatValidator, true),
            new Key('unit', $unitsValidator, true)
        );

        $structureValidator = new KeySet(
            new Key('values', new KeySet(
                new Key('distance1', $distanceValidator, true),
                new Key('distance2', $distanceValidator, true)
            ), true),
            new Key('response_unit', $unitsValidator, true));

        $structureValidator->assert($payload);
    }
}
