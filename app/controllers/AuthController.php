<?php

class AuthController extends BaseController
{
    public function index()
    {
        return View::make('admin.auth.index');
    }

    public function login()
    {
        $credentials = Input::only('email', 'password');

        if (Auth::attempt($credentials)) {
            Redirect::route('admin.index');
        }

        Session::flash('error', 'Wrong credentials.');

        return Redirect::route('auth.index');
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::route('public.index');
    }
} 