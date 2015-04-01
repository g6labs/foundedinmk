<?php

namespace G6\FoundedInMk\Users;

use G6\FoundedInMk\Core\Entity;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;

class User extends Entity implements AuthenticatableInterface
{
    use Authenticatable;

    protected $table = "users";
    protected $fillable = ["name", "email", "password"];
}
