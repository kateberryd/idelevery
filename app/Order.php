<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = [
        'user_id',
        'billing_first_name',
        'billing_last_name',
        'billing_address',
        'billing_city',
        'billing_country',
        'billing_state',
        'billing_total',
        'billing_subtotal',
        'billing_tax',
        'billing_postal_code',
    ] ;

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function products(){

        return $this->belongsToMany('App\Products')->withPivote('quantity');

    }
}
