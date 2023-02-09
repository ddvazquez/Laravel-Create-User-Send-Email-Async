<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

final class UserEloquentModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable = ['name', 'email', 'password'];
}
