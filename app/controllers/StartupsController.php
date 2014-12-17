<?php

use G6\FoundedInMk\Entities\Startup;

class StartupsController extends BaseController
{
    public function index()
    {
        $startups = Startup::all();

        return View::make('admin.startups.index', compact('startups'));
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

        return Response::json($data);
    }
} 