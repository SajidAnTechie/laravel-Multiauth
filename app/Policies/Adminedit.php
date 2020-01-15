<?php

namespace App\Policies;

use App\Admin;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Adminedit
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */


    public function update(Admin $adminid, Admin $admin)
    {

        return $adminid->id == $admin->id;
    }
}
