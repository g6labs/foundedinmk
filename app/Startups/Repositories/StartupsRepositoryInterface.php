<?php

namespace G6\FoundedInMk\Startups\Repositories;

use G6\FoundedInMk\Core\Repositories\RepositoryInterface;
use G6\FoundedInMk\Startups\Startup;

interface StartupsRepositoryInterface extends RepositoryInterface
{
    /**
     * Get startup by id
     *
     * @param int $id
     * @return Startup
     */
    public function get($id);

    /**
     * Returns all startups
     *
     * @return Startup[]
     */
    public function all();

    /**
     * Count the approved startups
     *
     * @return int
     */
    public function countApproved();

    /**
     * Count the startups waiting for approval
     *
     * @return int
     */
    public function countUnapproved();
} 