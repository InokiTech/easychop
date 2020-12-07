<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
 

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
    protected $redirectTo = '/';

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
        // ReCaptcha Validation
        // if(setting('captcha')){
        //   return Validator::make($data,[
        //             'fullname' => ['required', 'string', 'max:255','regex:(^([a-zA-Z_ ]+)([a-zA-Z]+)([a-zA-Z]+))'],
        //             'username' => ['required', 'string', 'max:255', 'unique:users','regex:(^[a-zA-Z0-9_]+)'],
        //             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //             'password' => ['required', 'string', 'min:8', 'confirmed'],
        //             'g-recaptcha-response' => 'required|captcha',
        //         ]);
        // }

        return Validator::make($data, [
            'fullname' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/',
            'address' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/',
            'city' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/',
            'phone' => 'required|regex:/^[0-9()-\+ ]+$/',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
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
        $this->registered =  User::create([
            'fullname' => $data['fullname'],
            'address' => $data['address'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'avatar' => URL::to('/')."/uploads/avatar/avatar.png",
            'status' => 'active',
        ]);

        $this->registered->assignRole('customers');

        activity()->performedOn($this->registered)->withProperties(['name'=>$this->registered->fullname,'by'=>$this->registered->fullname])->causedBy($this->registered)->log('Customer ccount was registered');
        return $this->registered;
    }

    public function showRegistrationForm()
    {
         $agent = new Agent();
        if( $agent->isMobile()){
          return view('frontend.mobile.register');  
        }else{
            return view('frontend.auth.register');
        }
        
    }

    protected function registered(Request $request, $user)
    {
        // if (setting('email_verification')) {
        //     $user->notify(new VerifyEmail());
        // }
    }


}
