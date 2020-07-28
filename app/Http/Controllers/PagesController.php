<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Pages\PagesContract;

class PagesController extends Controller
{
    protected $repo;

    public function __construct(PagesContract $pagesContract) {
        $this->repo = $pagesContract;
    }
    
    public function index()
    {
        //
        return view('index');
    }
    
    public function shop ()
    {
        return view('shop');
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
        return view('shop-grid');
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
