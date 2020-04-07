<?php
declare(strict_types=1);

namespace App\ValueObject;

/**
 * Class Distance
 *
 * @author Fernando Martins
 * @package App\ValueObject
 */
class Distance
{
    /** @var int */
    private $value;

    /** @var string */
    private $unit;

    public function __construct(int $value, string $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @return int
     */
    public function getValue(): int
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
