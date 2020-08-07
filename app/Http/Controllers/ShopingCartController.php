<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ShopingCart\ShopingCartContract;
use Cart;
use App\Products;

class ShopingCartController extends Controller
{
    protected $repo;

    public function __construct(ShopingCartContract $shopingCartContract) {
        $this->repo = $shopingCartContract;
    }
    
    public function index()
    {
        //
        
        return view('shopingcart.index');
    }
    
    public function create()
    {
        //
        
    }
    
    public function store(Request $request)
    {
        //
        $duplicate = Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if($duplicate->isNotEmpty()){

            $notification = array(
                'message' => "Item already exist in cart ",
                'alert-type' => 'success'
              );	
            return redirect()->route('cart.index')->with($notification);
        }
        
        Cart::add($request->id, $request->name,  $request->qty, $request->price )->associate('App\Products');
        $notification = array(
            'message' => "Item was added cart",
            'alert-type' => 'success'
          );	
              
          
          
    
       return redirect()->route('cart.index')->with($notification); 
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
        Cart::update($id, $request->quantity);

        // return response()->json(['success' => true]);

        $notification = array(
            'message' => "Cart item has been saved for later",
            'alert-type' => 'success'
          );

        return with($notification);


    }
    
    public function delete($id)
    {
        //
        Cart::remove($id);

        $notification = array(
            'message' => "Cart item was deleted",
            'alert-type' => 'success'
          );	
              
          
       return redirect()->back()->with($notification); 

    }

    public function switchToSaveForLater(Request $request)
    {
        //
        return 1234;

        Cart::instance('wishlist')->add($request->id, $request->name,  1, $request->price )->associate('App\Products');
        $notification = array(
            'message' => "Cart item has been saved for later",
            'alert-type' => 'success'
          );	
              
          
       return redirect()->back()->with($notification); 

    }
}
