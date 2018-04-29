<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request; 
use App\Admin;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

  public function showRegistrationForm()
    {
        return view('admin.auth.register');
    } 

        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return \App\User
         */ 
    
    public function register(Request $request)
    {

       //Validates data
        $this->validator($request->all());

       //Create admin
        $admin = $this->create($request->all());

        //Authenticates admin
        $this->guard()->login($admin);

       //Redirects admins
        return redirect($this->redirectTo);
    }

    //Validates admin's Input
        protected function validator(array $data)
        {       


            return $this->validate(request(), [
                'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|max:255|unique:users', 
                'password' => 'required|between:8,255|confirmed',
                'avatar'   => 'required|image', 
            ]);
        }


    //Create a new admin instance after a validation.
    protected function create(array $data)
    {  
          
     $public_path = 'uploads/avatar';
     $avatar_name = time() . '.' . request('avatar')->getClientOriginalExtension();
     request('avatar')->move($public_path , $avatar_name); 
          
     // $data['avatar']       =  request('avatar')->store('avatar'); 
     $data['avatar']       =  $avatar_name; 
     return Admin::create([ 
                'name'      => $data['name'],
                'email'     => $data['email'], 
                'password'  => bcrypt($data['password']),
                'avatar'    => $data['avatar'], 
                ]);
            
    }

    //Get the guard to authenticate admin
   protected function guard()
   {
       return auth()->guard('admin');
   }

}
