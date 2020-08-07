<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserContract;
use Sentinel;
class UserController extends Controller
{
    protected $repo;

    public function __construct(UserContract $userContract) {
        $this->repo = $userContract;
    }
    
    public function index()
    {
        if(!Sentinel::check()){
            return redirect()->route('user.login');
          }
          else{
            $users = $this->repo->findAll();
            // dd($users);
            return view('admin.index')->with('users', $users);
          }
    }

        public function AllCustomers()
        {
           
            if(!Sentinel::check()){
                return redirect()->route('user.login');
          }
          else{
            
            $users = $this->repo->findAllUsers();
            return view('user.index')->with('users', $users);
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
