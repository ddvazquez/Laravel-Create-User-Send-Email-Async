<?php declare(strict_types=1);


namespace Spfc\BoundedContext\Users\Domain;

use Spfc\Shared\Domain\ValueObject\Uuid;

final class UserId extends Uuid
{
    public function __construct(string $value, bool $isIdUnique)
    {
        if(!$isIdUnique) {
            throw new \InvalidArgumentException(
                sprintf('<%s> id already exists.', $value)
            );
        }

        parent::__construct($value);
    }
}
