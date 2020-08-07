<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Products extends Model
{
    //
    public function loadVendor()
    {
        return $this->vendor->first();
        
    }

    public function vendor() {
        return $this->hasOne(User::class);
    }
}
