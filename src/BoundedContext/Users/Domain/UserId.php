<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Domain;

use Spfc\Shared\Domain\ValueObject\Uuid;

final class UserId extends Uuid
{
    /**
     * @param  string  $value
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}
