<?php

namespace App\Repositories\Vendors;
use App\User;
use App\Repositories\Vendors\VendorsContract;

class EloquentVendorsRepository implements VendorsContract {
    //
    public function findAllVendors(){
        $vendors = User::where('user_role', 'vendor')->get();
        return $vendors;
        
    }
}
