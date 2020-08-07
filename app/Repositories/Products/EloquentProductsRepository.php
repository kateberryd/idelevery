<?php

namespace App\Repositories\Products;

use App\Repositories\Products\ProductsContract;
use App\Products;
use Sentinel;

class EloquentProductsRepository implements ProductsContract {
    //
    public function create($request){
        $product = new Products;
        $product->product_name = $request->product_name;  
        $product->product_image = $request->product_image;  
        $product->product_category = $request->product_category;  
        $product->product_price = $request->product_price; 
        $product->product_description = $request->product_description; 
        $product->product_status = $request->product_status;   
        $product->user_id = Sentinel::getUser()->id;
        $str = strtolower($request->product_name);
        $product->slug = preg_replace('/\s+/', '-', $str);
        return $product;
        // dd($productCategory);
    }

    public function findAll() {
        return Products::all();
      }
    
      // return a news category by ID
      public function findById($id) {
        return  Products::where('id', $id)->first();
      }



      public function findByUserId() {
        $user_id = Sentinel::getUser()->id;
        return  Products::where('user_id', $user_id)->get();
      }
    
      // return a news category by slug
      public function findBySlug($slug){
        return Product_category::where('slug', $slug)->first();
      }
    
      // Update a news category
      public function update($request, $id) {
        $product = $this->findById($id);
        $product->product_name = $request->product_name;  
        $product->product_image = $request->product_image;  
        $product->product_category = $request->product_category;  
        $product->product_price = $request->product_price; 
        $product->product_description = $request->product_description; 
        $product->product_status = $request->product_status;   
        $str = strtolower($request->product_name);
        $product->slug = preg_replace('/\s+/', '-', $str);
        return $product;
      }
    
      // Remove a Menu Item
      public function remove($id) {
        $product = $this->findById($id);
        return $product->delete();
      }
    
}
