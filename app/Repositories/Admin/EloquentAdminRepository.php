<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\AdminContract;
use App\Products;

class EloquentAdminRepository implements AdminContract {
    //
    public function findAll() {
        return Products::all();
     }
}
