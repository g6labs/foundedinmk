<?php

use G6\FoundedInMk\Entities\Startup;

class PublicController extends BaseController
{
	public function index()
	{
        $startups = Startup::where('approved', true)->get()->all();

		return View::make('homepage', compact('startups'));
	}

    public function create()
    {

    }
}
