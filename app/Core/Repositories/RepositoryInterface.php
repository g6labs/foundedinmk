<?php

namespace G6\FoundedInMk\Core\Repositories;

use G6\FoundedInMk\Core\Entity;

interface RepositoryInterface
{
    /**
     * Store the specified entity
     *
     * @param Entity $startup
     * @return void
     */
    public function store(Entity $startup);

    /**
     * Delete the specified entity from storage
     *
     * @param int $id
     * @return bool
     */
    public function destroy($id);
} 