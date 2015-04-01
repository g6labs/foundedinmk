<?php

namespace G6\FoundedInMk\Http\Controllers;

use G6\FoundedInMk\Startups\Repositories\StartupsRepositoryInterface;

class AdminController extends Controller
{
    protected $startups;

    public function __construct(StartupsRepositoryInterface $startups)
    {
        $this->startups = $startups;
    }

    public function index()
    {
        $approved = $this->startups->countApproved();
        $waiting = $this->startups->countUnapproved();

        return \View::make('admin.index', compact('approved', 'waiting'));
    }
} 