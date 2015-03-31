<?php

namespace G6\FoundedInMk\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableInterface
{
    use Authenticatable;

    protected $table = "users";
    protected $fillable = ["name", "email", "password"];
}
