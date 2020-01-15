<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Post;
use App\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Spatie\QueryBuilder\QueryBuilder;

class AdminPageController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function users()
    {

        // $users = QueryBuilder::for(User::class)
        //     ->allowedFilters(['name'])
        //     ->paginate(10)
        //     ->get();


        if (request('q')) {

            $users = User::search(request('q'))->paginate(10)->appends('q', request('q'));

            //$users = User::where('name', 'like', '%' . request('q') . '%')->orwhere('email', 'like', '%' . request('q') . '%')->paginate(10);
        } else if (request('gender')) {

            $users = User::where('gender', request('gender'))->paginate(5)->appends('gender', request('gender'));
        } else {

            $users = User::paginate(5);
        }

        return view('admin-pagaes.users', ['users' => $users]);
    }

    public function admins()
    {

        $admins = Admin::paginate(5);

        return view('admin-pagaes.admin', ['admins' => $admins]);
    }

    public function show(Admin $admin)
    {

        return view('admin-pagaes.show', compact('admin'));
    }

    public function user_show(User $user)
    {
        return view('admin-pagaes.usershow', compact('user'));
    }

    public function delete(User $user)
    {

        $user->delete();

        return back()->withToastSuccess('User Deleted Succeful !');
    }

    public function admin_delete(Admin $admin)
    {

        $admin->delete();

        return back()->withToastSuccess('Admin Deleted Succeful !');
    }

    public function admin_create()
    {
        return view('admin-pagaes.admincreate');
    }

    public function admin_store()
    {

        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Admin::create($attributes);

        return redirect(route('admin.dasboard.admins'))->withSuccess('Admin Dreated Ducceful !');
    }

    public function admin_edit(Admin $admin)
    {

        $this->authorize('update', $admin);

        return view('admin-pagaes.editadmin', compact('admin'));
    }

    public function admin_editsave(Admin $admin)
    {



        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ]);

        $admin->update($attributes);

        return redirect(route('admin.dasboard.admins'))->withSuccess('Admin Info Updated !');
    }
}
