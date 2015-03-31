<?php

namespace G6\FoundedInMk\Http\Controllers;

use G6\FoundedInMk\Entities\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return \View::make('admin.users.index', compact('users'));
    }

    public function create()
    {
        $data = \Input::all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return \Redirect::route('admin.users.index');
    }

    public function delete($id)
    {
        User::destroy($id);
        return \Redirect::route('admin.users.index');
    }
} 