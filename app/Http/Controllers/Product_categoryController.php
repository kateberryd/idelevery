<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product_category\Product_categoryContract;
use Sentinel;

class Product_categoryController extends Controller
{
    protected $repo;

    public function __construct(Product_categoryContract $product_categoryContract) {
        $this->repo = $product_categoryContract;
    }
    
    public function index()
    {
        //
        $product_categories = $this->repo->findAll();
        return view('product_category.index')->with('product_categories', $product_categories);
    }
    
    public function create()
    {
        //
        
    }
    
    public function store(Request $request) {
        if(!Sentinel::check()){
          return redirect()->route('user.login');
        }
        else{
          $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
          ]);
      
          try {
            $product_category = $this->repo->create($request);
      
            $notification = array(
              'message' => "Product Category $product_category->name created successfully",
              'alert-type' => 'success'
            );		
      
            if($product_category->id) {
            //  dd($product_category);   
            return redirect()->back()->with($notification);
            } else {
              return back()->withInput()->with('error', 'Could not create news category. Try again!');
            }
          } catch (QueryException $e) {
            
            $error = array(
              'message' => "News Category $request->name already exists!",
              'alert-type' => 'error'
            );
      
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
              return redirect()->back()->withInput()->with($error);
            }
          }
        }
      }
    
    public function show($id)
    {
        //
    }
    
    public function edit($slug)
    {
        //
        $categoryDetail =  $this->repo->findBySlug($slug);
        return view('product_category.edit')->with('categoryDetail', $categoryDetail);
    }
    
    public function update(Request $request, $slug)
    {
        //
        
        if(!Sentinel::check()){
          return redirect()->route('user.login');
        }
        else{
          $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
          ]);
      
          try {
            $product_category = $this->repo->update($request, $slug);
      
            $notification = array(
              'message' => "Category $product_category->name updated successfully",
              'alert-type' => 'success'
            );		
      
            if($product_category->id) {
            //  dd($product_category);   
            return redirect('/admin/category')->with($notification);
            } else {
              return back()->withInput()->with('error', 'Could not update news category. Try again!');
            }
          } catch (QueryException $e) {
            
            $error = array(
              'message' => " Category $request->name already exists!",
              'alert-type' => 'error'
            );
      
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
              return redirect()->back()->withInput()->with($error);
            }
          }
        }
    }
    
    public function delete($slug)
    {
      if ($this->repo->remove($slug)) {
        $notification = array(
          'message' => "Category deleted successfully",
          'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
       } else {
        $error = array(
          'message' => 'Error Deleting Category',
          'alert-type' => 'error'
        );
        return back()->with($error);
      }    
    }
}
