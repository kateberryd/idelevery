<?php

namespace App\Repositories\Authentication;

use App\Repositories\Authentication\AuthenticationContract;
use Sentinel;
use App\User;

class EloquentAuthenticationRepository implements AuthenticationContract {
    //
    public function create($request){
    $str = strtolower($request->first_name);
       
    $credentials = [
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'phone_number' => $request->phone_number,
      'email'    => $request->email,
      'username'    => $request->username,
      'password' => bcrypt($request->password ?: 'secret'),
      'user_role' => $request->user_role,
      'slug' => $request->first_name,
      'address' => $request->address,

    ];

    // dd($credentials);

    $userRole = $request->user_role;
    $user = User::create($credentials);
    // dd($user);
    
    $role = Sentinel::findRoleBySlug($userRole);
    $role->users()->attach($user);
    // $this->sendEmail($user, $activation->code);
    return $user;
    }
}
