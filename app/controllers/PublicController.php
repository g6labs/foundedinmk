<?php

use G6\FoundedInMk\Entities\Startup;

class PublicController extends BaseController
{
	public function index()
	{
        $featured = Startup::where('approved', true)->where('featured', true)->get()->all();

        $startups = Startup::where('approved', true)->where('featured', false)->get()->all();

		return View::make('homepage', compact('startups', 'featured'));
	}

    public function create()
    {
        $input = Input::all();

        $validator = Validator::make($input,
            [
                'name' => 'required',
                'year_founded' => 'required|digits:4',
                'website' => 'required|url',
                'twitter' => 'required|alpha_dash',
                'logo_url' => 'required|url',
                'contact_name' => 'alpha',
                'contact_email' => 'email'
            ]
        );

        if ($validator->fails()) {
            $data['status'] = 'warning';
            //$data['message'] = "Please enter valid information";
            $data['message'] = $validator->messages()->first();

            return Response::json($data);
        }

        $input['founded'] = $input['year_founded'];
        $input['url'] = $input['website'];

        $startup = Startup::create($input);

        $data['status'] = 'success';
        $data['message'] = "Startup submitted and waiting to be approved.";

        return Response::json($data);
    }
}

