<?php

namespace G6\FoundedInMk\Startups\Repositories;

use G6\FoundedInMk\Core\Repositories\AbstractEloquentRepository;
use G6\FoundedInMk\Startups\Startup;

class EloquentStartupsRepository extends AbstractEloquentRepository implements StartupsRepositoryInterface
{
    public function __construct(Startup $entity)
    {
        $this->entity = $entity;
    }

    public function countApproved()
    {
        return $this->entity->where('approved', true)->count();
    }

    public function countUnapproved()
    {
        return $this->entity->where('approved', false)->count();
    }
}