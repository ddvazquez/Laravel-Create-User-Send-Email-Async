<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Domain;

use Illuminate\Support\Facades\Hash;
use Spfc\Shared\Domain\ValueObject\StringValueObject;

final class UserPassword extends StringValueObject
{
    /**
     * @param  string  $value
     */
    public function __construct(string $value)
    {
        $this->value = Hash::make($value);
    }
}
