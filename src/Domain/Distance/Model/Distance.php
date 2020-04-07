<?php
declare(strict_types=1);

namespace App\Domain\Distance\Model;

/**
 * Class Distance
 *
 * @author Fernando Martins
 * @package App\ValueObject
 */
class Distance
{
    /** @var float */
    private $value;

    /** @var string */
    private $unit;

    public function __construct(float $value, string $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }
}
