<?php

namespace G6\FoundedInMk\Users\Repositories;

use G6\FoundedInMk\Core\Repositories\RepositoryInterface;
use G6\FoundedInMk\Users\User;

interface UsersRepositoryInterface extends RepositoryInterface
{
    /**
     * Returns all startups
     *
     * @return User[]
     */
    public function all();
}
