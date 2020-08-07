<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Pages\PagesContract;
use Sentinel;
use App\Products;

class PagesController extends Controller
{
    protected $repo;

    public function __construct(PagesContract $pagesContract) {
        $this->repo = $pagesContract;
    }
    
    public function index()
    {
        //
        $products = Products::all();
        return view('index')->with('products', $products);
    }
    
    public function shop ()
    {
        $products = Products::all();
        return view('shop')->with('products', $products);
    }
    public function shopDetails ()
    {
        return view('shop-details');
    }
    public function checkout ()
    {
        return view('checkout');
    }
    public function shopGrid ()
    {
        $products = Products::all();
        return view('shop-grid')->with('products', $products);
    }
    public function shopingCart ()
    {
        return view('shoping-cart');
    }
    public function contact ()
    {
        return view('contact');
    }
    public function blog ()
    {
        return view('blog');
    }
    public function blogDetails ()
    {
        return view('blog-details');
    }
    
    
}
