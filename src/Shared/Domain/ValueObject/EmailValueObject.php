<?php

declare(strict_types=1);

namespace Spfc\Shared\Domain\ValueObject;

use InvalidArgumentException;

abstract class EmailValueObject
{
    protected string $value;

    /**
     * @param  string  $value
     */
    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value();
    }

    /**
     * @param  string  $value
     * @return void
     */
    private function validate(string $value): void
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the invalid email: <%s>.', EmailValueObject::class, $value)
            );
        }
    }
}
