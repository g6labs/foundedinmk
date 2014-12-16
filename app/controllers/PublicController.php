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
        $input = Input::all();

        /** @todo Validate the input */

        $startup = Startup::create($input);

        /** @todo Return json, as this method should be called via ajax */

        Session::flash('startup-inserted', true);

        return Redirect::route('public.index');
    }
}

