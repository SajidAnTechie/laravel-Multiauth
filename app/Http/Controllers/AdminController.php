<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Post;
use App\User;
use ConsoleTVs\Charts\ChartsServiceProvider;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = User::all()->count();
        $posts = Post::all()->count();
        $admins = Admin::all()->count();
        return view('admin', compact('posts', 'users', 'admins'));
    }
}
