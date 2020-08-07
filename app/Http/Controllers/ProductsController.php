<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Products\ProductsContract;
use App\Product_category;
use Image;
use Sentinel;
use App\Products;

class ProductsController extends Controller
{
    protected $repo;

    public function __construct(ProductsContract $productsContract) {
        $this->repo = $productsContract;
    }
    
    public function index()
    {
      if(!Sentinel::check()){
        return redirect()->route('user.login');
      }
      else{
        $vendor_products = $this->repo->findByUserId();
        $product_categories = Product_category::all();
        return view('products.index')->with('vendor_products', $vendor_products)->with('product_categories', $product_categories);
      }
    }

    public function productDetails($id)
    {
        $productDetail =  $this->repo->findById($id);
        // dd($productDetail->vendor);
        return view('shop-details')->with('productDetail', $productDetail);
    }
    

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        // return 12345;
        if(!Sentinel::check()){
            return redirect()->route('user.login');
          }
          else{
            $this->validate($request, [
              'product_name' => 'required',
              'product_category' => 'required',
              'product_image' => 'required',
              'product_description' => 'required',
              'product_price' => 'required',
              // 'product_status' => 'required',
            ]);
              
              if($request->has('product_image')) { 
                $file = $request->file('product_image');
                $extension = $file->getClientOriginalExtension();
                $filename =time().'.'.$extension;
                $file->move('uploads/products/', $filename);
                Image::make('uploads/products/'. $filename)
                ->resize(150, 150)->save('uploads/products/thumbnails/'. $filename, 50);
              }

            try {
              $product = $this->repo->create($request);
              $product['product_image'] = $filename;
              $product->save();
                  
                   	
        
              $notification = array(
                'message' => "Product  $product->name added successfully",
                'alert-type' => 'success'
              );		
        
              if($product->id) {
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
        
    }
    
    public function edit($id)
    {
        //
        $product_categories = Product_category::all();
        $productDetail =  $this->repo->findById($id);
        return view('products.edit')->with('product_categories', $product_categories)->with('productDetail', $productDetail);
    }
    
    public function update(Request $request, $id)
    {
        //
        
        if(!Sentinel::check()){
            return redirect()->route('user.login');
          }
          else{
            $this->validate($request, [
              'product_name' => 'required',
              'product_category' => 'required',
              'product_image' => 'required',
              'product_description' => 'required',
              'product_price' => 'required',
              // 'product_status' => 'required',
            ]);
           
              
              if($request->has('product_image')) { 
                $file = $request->file('product_image');
                $extension = $file->getClientOriginalExtension();
                $filename =time().'.'.$extension;
                $file->move('uploads/products/', $filename);
                Image::make('uploads/products/'. $filename)
                ->resize(150, 150)->save('uploads/products/thumbnails/'. $filename, 50);
              }

            try {
              $product = $this->repo->update($request, $id);
              $product['product_image'] = $filename;
              $product->save();
                  
                   	
        
              $notification = array(
                'message' => "Product  $product->name updated successfully",
                'alert-type' => 'success'
              );		
        
              if($product->id) {
              //  dd($product_category);   
              return redirect('/vendor/products')->with($notification);
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
    
    public function delete($id)
    {
        //
        if ($this->repo->remove($id)) {
          $notification = array(
            'message' => "Product deleted successfully",
            'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);
         } else {
          $error = array(
            'message' => 'Error Deleting Product',
            'alert-type' => 'error'
          );
          return back()->with($error);
        }    
    }
}
