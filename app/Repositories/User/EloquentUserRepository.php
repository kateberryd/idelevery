<?php

namespace App\Repositories\User;

use App\Repositories\User\UserContract;
use App\User;

class EloquentUserRepository implements UserContract {
    //

    public function findAll() {
        return User::all();
    }

    public function findAllUsers(){
        $users = User::where('user_role', 'user')->get();
        return $users;
        
    }

    
}
