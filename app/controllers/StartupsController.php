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

    public function toggleFeatured($id)
    {
        $startup = Startup::find($id);

        if (!$startup) {
            $data = [
                "status" => "warning",
                "message" => "There was some error with your request"
            ];
        }

        $startup->featured = !$startup->featured;
        $startup->save();

        $data = [
            "status" => "success",
            "message" => "The startup was successfully changed."
        ];

        return Response::json($data);
    }
} 