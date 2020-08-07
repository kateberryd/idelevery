<?php

namespace App\Http\Controllers;
use Sentinel;
use Illuminate\Http\Request;
use App\Repositories\Vendors\VendorsContract;

class VendorsController extends Controller
{
    protected $repo;

    public function __construct(VendorsContract $vendorsContract) {
        $this->repo = $vendorsContract;
    }
    
    public function index()
    {
        //
      
    }

    public function AllVendors()
    {
       
        if(!Sentinel::check()){
            return redirect()->route('user.login');
      }
      else{
        
        $vendors = $this->repo->findAllVendors();
        return view('vendors.index')->with('vendors', $vendors);
      }
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
