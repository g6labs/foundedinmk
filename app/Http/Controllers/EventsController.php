<?php

namespace G6\FoundedInMk\Http\Controllers;

use G6\FoundedInMk\Timeline\Event;
use G6\FoundedInMk\Users\User;
use G6\FoundedInMk\Timeline\Repositories\EventsRepository;

class EventsController extends Controller
{
    public $eventsRepository;

    public function __construct(EventsRepository $eventsRepository)
    {
        $this->eventsRepository = $eventsRepository;
    }

    // frontpage
	public function index()
    {
        $events = Event::where('approved', true)->orderBy('event_date')->get()->all();

        return \View::make('timeline', compact('events'));
    }

    // backend
    public function adminIndex()
    {
        $events = Event::where('approved', true)->orderBy('event_date')->get()->all();

        return \View::make('admin.events.index', compact('events'));
    }

    public function getCreate()
    {
        return \View::make('admin.events.new');
    }

    public function create()
    {
        $input = \Input::all();

        $validator = \Validator::make($input,
            [
                'title_en'          => 'required',
                'title_local'       => 'required',
                'description_en'    => 'required',
                'description_local' => 'required',
                'action_text_en'    => 'required',
                'action_text_local' => 'required',
                'action_url'        => 'required|url',
                'event_date'        => 'required',
            ]
        );

        if ($validator->fails()) {
            $data['status'] = 'warning';
            //$data['message'] = "Please enter valid information";
            $data['message'] = $validator->messages()->first();

            return \Redirect::route('admin.events.new')->withErrors($validator)->withInput($input);
        }

        $input['slug'] = \Input::has('slug') ?: $this->generateSlug($input['title_en']);

        $startup = Event::create($input);

        $data['status'] = 'success';
        $data['message'] = "Event added.";

        return \Response::json($data);
    }

    private function generateSlug($string)
    {
        return \Str::slug($string);
    }
}

