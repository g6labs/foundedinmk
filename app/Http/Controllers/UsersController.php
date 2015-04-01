<?php

namespace G6\FoundedInMk\Http\Controllers;

use G6\FoundedInMk\Users\Repositories\UsersRepositoryInterface;
use G6\FoundedInMk\Users\User;

class UsersController extends Controller
{
    protected $users;

    public function __construct(UsersRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $users = $this->users->all();

        return \View::make('admin.users.index', compact('users'));
    }

    public function create()
    {
        $data = \Input::all();
        $data['password'] = \Hash::make($data['password']);
        $user = User::create($data);

        return \Redirect::route('admin.users.index');
    }

    public function delete($id)
    {
        $this->users->destroy($id);

        return \Redirect::route('admin.users.index');
    }
} 