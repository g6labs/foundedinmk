<?php

namespace G6\FoundedInMk\Http\Controllers;

class AuthController extends Controller
{
    public function index()
    {
        return \View::make('admin.auth.index');
    }

    public function login()
    {
        $credentials = \Input::only('email', 'password');

        if (\Auth::attempt($credentials)) {
            return \Redirect::route('admin.index');
        }

        \Session::flash('error', 'Wrong credentials.');

        return \Redirect::route('auth.index');
    }

    public function logout()
    {
        \Auth::logout();

        return \Redirect::route('public.index');
    }
} 