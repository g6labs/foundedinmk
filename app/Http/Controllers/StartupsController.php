<?php

namespace G6\FoundedInMk\Http\Controllers;

use G6\FoundedInMk\Startups\Repositories\StartupsRepositoryInterface;
use G6\FoundedInMk\Startups\Startup;

class StartupsController extends Controller
{
    protected $startups;

    public function __construct(StartupsRepositoryInterface $startups)
    {
        $this->startups = $startups;
    }

    public function index()
    {
        $startups = $this->startups->all();

        return \View::make('admin.startups.index', compact('startups'));
    }

    public function delete($id)
    {
        $data = [
            "status" => "warning",
            "message" => "There was some error with your request"
        ];

        if (Startup::destroy($id)) {
            $data["status"] = "success";
            $data["message"] = "The startup was successfully deleted.";
        }

        return \Response::json($data);
    }

    public function toggleFeatured($id)
    {
        $startup = $this->startups->get($id);

        if (!$startup) {
            $data = [
                "status" => "warning",
                "message" => "There was some error with your request"
            ];

            return \Response::json($data);
        }

        $startup->featured = !$startup->featured;
        $this->startups->store($startup);

        $data = [
            "status" => "success",
            "message" => "The startup was successfully changed."
        ];

        return \Response::json($data);
    }

    public function approve($id)
    {
        $startup = $this->startups->get($id);

        if (!$startup) {
            $data = [
                "status" => "warning",
                "message" => "There was some error with your request"
            ];

            return \Response::json($data);
        }

        $startup->approved = true;
        $this->startups->store($startup);

        $data = [
            "status" => "success",
            "message" => "The startup was successfully approved."
        ];

        if ($startup->contact_email != "") {
            \Mail::send('emails.startup-approved', ["startup" => $startup],
                function($message) use ($startup) {
                    $message->to($startup->contact_email)->subject('Startup application approved');
                }
            );
        }

        return \Response::json($data);
    }

    public function decline($id)
    {
        $startup = $this->startups->get($id);

        if (!$startup) {
            $data = [
                "status" => "warning",
                "message" => "There was some error with your request"
            ];

            return \Response::json($data);
        }

        $this->startups->destroy($startup->id);

        $data = [
            "status" => "success",
            "message" => "The startup was successfully declined."
        ];

        if ($startup->contact_email != "") {
            \Mail::send('emails.startup-declined', ["startup" => $startup],
                function($message) use ($startup) {
                    $message->to($startup->contact_email)->subject('Startup application declined');
                }
            );
        }

        return \Response::json($data);
    }

    public function edit($id)
    {
        $startup = $this->startups->get($id);

        return \View::make('admin.startups.edit', compact('startup'));
    }

    public function update($id)
    {
        $startup = $this->startups->get($id);
        $startup->fill(\Input::all());

        if (\Input::hasFile('logo')) {
            $logo = \Input::file('logo');
            $startupNameHash = md5($startup->name);
            $fileName =  md5($logo->getClientOriginalName()) . "." . $logo->getClientOriginalExtension();
            $logo->move(public_path() . "/static/logos/" . $startupNameHash, $fileName);
            $startup->logo = $startupNameHash . "/". $fileName;
        }

        $this->startups->store($startup);

        return \Redirect::route('admin.startups.index');

    }
} 