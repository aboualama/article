<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'img'      => 'image',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if (request()->hasFile('img')) 
        { 
            
            $photo_name = time() . '.' . request('img')->getClientOriginalExtension();
                $public_path = 'uploads/user'; 
                request('img')->move($public_path , $photo_name); 
            }else
            {  
                if(request('gender') === 'Male') 
                {
                    $photo_name = 'm_default.jpg'; 
                }
                else
                {
                    $photo_name = 'f_default.jpg'; 
                } 
            } 
  
        $data['img']       =  $photo_name; 

        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'date'     => $data['date'],
            'gender'   => $data['gender'],
            'img'      => $data['img'],
            'password' => bcrypt($data['password']),
        ]);

 
    }
}
