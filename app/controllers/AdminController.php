<?php

use G6\FoundedInMk\Entities\Startup;

class AdminController extends BaseController
{
    public function index()
    {
        $approved = Startup::where('approved', true)->count();
        $waiting = Startup::where('approved', false)->count();
        return View::make('admin.index', compact('approved', 'waiting'));
    }
} 