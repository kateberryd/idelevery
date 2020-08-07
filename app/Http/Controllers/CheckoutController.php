<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Checkout\CheckoutContract;

class CheckoutController extends Controller
{
    protected $repo;

    public function __construct(CheckoutContract $checkoutContract) {
        $this->repo = $checkoutContract;
    }
    
    public function index()
    {
        //
         return view('checkout.index');
    }
   
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function delete($id)
    {
        //
    }
}
