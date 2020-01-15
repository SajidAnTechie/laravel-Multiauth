<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdmincreateuserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        return view('admin-pagaes.createusers');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        //return $attributes;

        User::create($attributes);

        return redirect(route('admin.dasboard.users'))->withSuccess('User Created Succeful !');
    }
}
