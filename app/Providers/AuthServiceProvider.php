<?php

namespace App\Providers;

use App\Admin;
use App\Policies\Adminedit;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Admin' => 'App\Policies\Adminedit',

        Admin::class => Adminedit::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // Gate::before(function (Admin $admin) {
        //     return $admin->id == 1;
        // });
        //
    }
}
