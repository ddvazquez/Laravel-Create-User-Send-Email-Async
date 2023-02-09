<?php declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Domain;

use Spfc\Shared\Domain\ValueObject\EmailValueObject;

final class UserEmail extends EmailValueObject
{
    public function __construct(string $value, bool $isEmailUnique)
    {
        if(!$isEmailUnique) {
            throw new \InvalidArgumentException(
                sprintf('<%s> email already exists.', $value)
            );
        }

        parent::__construct($value);
    }
}
