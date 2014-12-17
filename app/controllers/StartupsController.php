<?php

use G6\FoundedInMk\Entities\Startup;

class StartupsController extends BaseController
{
    public function index()
    {
        $startups = Startup::all();

        return View::make('admin.startups.index', compact('startups'));
    }
} 