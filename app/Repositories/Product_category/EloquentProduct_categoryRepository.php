<?php

namespace App\Repositories\Product_category;

use App\Repositories\Product_category\Product_categoryContract;
use App\Product_category;

class EloquentProduct_categoryRepository implements Product_categoryContract {
    //
    public function create($request){
        $productCategory = new Product_category;
        $productCategory->name = $request->name;  
        $productCategory->description = $request->description;   
        $str = strtolower($request->name);
        $productCategory->slug = preg_replace('/\s+/', '-', $str);
        $productCategory->save();
        return $productCategory;
        // dd($productCategory);
    }

    public function findAll() {
        return Product_category::all();
      }
    
      // return a news category by ID
      public function findById($id) {
        return  Product_category::where('id', $id)->first();
      }
    
      // return a news category by slug
      public function findBySlug($slug){
        return Product_category::where('slug', $slug)->first();
      }
    
      // Update a news category
      public function update($request, $slug) {
        $productCategory = $this->findBySlug($slug);
        $productCategory->name = $request->name;  
        $productCategory->description = $request->description;   
        $str = strtolower($request->name);
        $productCategory->slug = preg_replace('/\s+/', '-', $str);
        $productCategory->save();
        return $productCategory;
      }
    
      // Remove a Menu Item
      public function remove($slug) {
        $productCategory = $this->findBySlug($slug);
        return $productCategory->delete();
      }
    
}
