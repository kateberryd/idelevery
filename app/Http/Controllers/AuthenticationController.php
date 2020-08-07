<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Authentication\AuthenticationContract;
use Sentinel;

class AuthenticationController extends Controller
{
    protected $repo;

    public function __construct(AuthenticationContract $authenticationContract) {
        $this->repo = $authenticationContract;
    }
    
    public function index()
    {
        //
        return view('authentication.login');
    }
    
    public function create()
    {
        //
        return view('authentication.register');
    }
    
    public function vendorLogin(Request $request)
    {
        //
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
          ]);
  
          $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
          ];
  
         
                  
          try {
            if(Sentinel::forceauthenticate($credentials)) {
                  $authUser = Sentinel::getUser();
                  
                  
                  try {
                    if (Sentinel::getUser()->roles()->first()->slug === 'superadmin') {						
                        return redirect()->route('admin.index');                  
                       }
                    elseif (Sentinel::getUser()->roles()->first()->slug === 'admin')  {
                         return redirect()->route('admin.index');                          
                      } elseif (Sentinel::getUser()->roles()->first()->slug === 'vendor')  {
                                              
                          return redirect()->route('vendor.index');
                      }
                     elseif (Sentinel::getUser()->roles()->first()->slug === 'user') {			
                          return redirect()->route('page.index');
                    }
                  } catch (\BadMethodCallException $e) {
                    return redirect()->route('login.get')->with('error', 'Your Session has expired. Please login again!');
                  }
            } else {			
                  return redirect()->back()->withInput()->with('error', 'Ops... Your Login Credentials did not match');
            }
          } catch(ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "Ops.. You have been banned for $delay seconds."]);
          } catch(NotActivatedException $e){
            return redirect()->back()->with(['error' => 'Ops... Your account is not yet activated, please check your email for activation code or link']);
          }
    }
    public function store(Request $request){
      
        $this->validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required', 
          'password' => 'required',
          'phone_number' => 'required',
          'address' => 'required',
          'username' => 'required',
          'user_role' => 'required',
        ]);
    
        try {
          $user = $this->repo->create($request);
    
          $notification = array(
            'message' => "User $user->first_name $user->last_name created successfully",
            'alert-type' => 'success'
          );		
    
          if($user->id) {
            return redirect()->back()->with($notification);
          } else {
            return back()->withInput()->with('error', 'Could not create user. Try again!');
          }
        } catch (QueryException $e) {
          
          $error = array(
            'message' => "Account for $request->first_name $request->last_name already exists!",
            'alert-type' => 'error'
          );
    
          $errorCode = $e->errorInfo[1];
          if($errorCode == 1062){
            return redirect()->back()->withInput()->with($error);
          }
        }
      
    }
    

    public function logout() {
      Sentinel::logout(null, true);
      return redirect()->route('user.login');
    }
    
}
