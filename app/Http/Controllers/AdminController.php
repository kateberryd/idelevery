<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\AdminContract;
use Sentinel;

class AdminController extends Controller
{
    protected $repo;

    public function __construct(AdminContract $adminContract) {
        $this->repo = $adminContract;
    }
    
    public function index()
    {
     $products = $this->repo->findAll();
      return view('admin.products')->with('products', $products);
    }
    
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        
       
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
