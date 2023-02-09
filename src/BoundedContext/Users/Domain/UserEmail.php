<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Domain;

use Spfc\Shared\Domain\ValueObject\EmailValueObject;

final class UserEmail extends EmailValueObject
{
    /**
     * @param  string  $value
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}
