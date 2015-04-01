<?php

namespace G6\FoundedInMk\Core\Repositories;

use G6\FoundedInMk\Core\Entity;

class AbstractEloquentRepository implements RepositoryInterface
{
    /** @var Entity $entity  */
    protected $entity;

    public function all()
    {
        return $this->entity->all();
    }

    public function get($id)
    {
        return $this->entity->find($id);
    }

    public function store(Entity $entity)
    {
        return $entity->save();
    }

    public function destroy($id)
    {
        return ($this->entity->destroy($id) > 0);
    }
}
