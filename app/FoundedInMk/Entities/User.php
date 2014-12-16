<?php

namespace G6\FoundedInMk\Entities;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements UserInterface
{
    use UserTrait;

    protected $table = "users";
}
