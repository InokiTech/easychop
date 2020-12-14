<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Jenssegers\Agent\Agent;
class CustomerController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware(['web','auth']);
    }

    // public function registerCustomerForm()
    // {
    //     return view('frontend.auth.register');
    // }

    // public function registerCustomer(Request $data)
    // {
    //     $this->validate($data, [
    //         'fullname' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/',
    //         'email' => 'required|email|max:255|unique:users',
    //         'address' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/',
    //         'city' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/',
    //         'phone' => 'required|regex:/^[0-9()-\+ ]+$/',
    //         'password' => 'required|string|confirmed',
    //         'password_confirmation' => 'required|string|same:password',
    //     ]);

    //     $user =  User::create([
    //         'fullname' => $data['fullname'],
    //         'email' => $data['email'],
    //         'address' => $data['address'],
    //         'city' => $data['city'],
    //         'phone' => $data['phone'],
    //         'password' => bcrypt($data['password']),
    //         'avatar' => URL::to('/') . "/uploads/avatar/avatar.png",
    //         'status' => 'active',
    //     ]);

    //     $user->assignRole('customers');

    //     activity()->performedOn($user)->withProperties(['name' => $user->fullname, 'by' => $user->fullname])->causedBy($user)->log('Customer account was registered');

    //     $credential = $data->only('email', 'password');

    //     if (Auth::attempt($credential)) {
    //         return redirect('/');
    //     }

    //     return redirect('/register');
    // }

    // public function loginCustomerForm()
    // {
    //     if (!Auth::guest()) {
    //         return redirect('/');
    //     }

    //     return view('frontend.auth.login');
    // }



    // public function loginCustomer(Request $request)
    // {
    //     $this->validate($request,[
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (!Auth::attempt($credentials)) {
    //         $this->login($request);
    //         return back();
    //     }

    //     $this->attemptLogin($request);
    //     if(!Auth::user()->hasRole('customers')){
    //         Auth::logout();
    //         alert()->error('This is not a customer account')->persistent('close');
    //         return back();
    //     }
    //     return redirect('/');

    // }

    public function profileCustomer()
    {

        $agent = new Agent();
        if ($agent->isMobile()){
            return view('frontend.mobile.profile');
        }else{
            return view('frontend.customer.profile');
        }


    }

    public function updateProfileCustomer(Request $request, User $user)
    {
        $this->validate($request,[
            'fullname' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/',
            'address' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/',
            'city' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/',
            'phone' => 'required|numeric',
        ]);

        if(!$user){
            abort(404);
        }

        $status = auth()->user()->fill([
            'fullname' => $request->fullname,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
        ])->save();

        $agent = new Agent();
        if ($agent->isMobile()){

            if($status){
                return response()->json([
                    'msg' => 'updated successfully',
                ]);
            }else{
                return response()->json([
                    'msgErr' => 'Oops! There was an error when trying to updated customer profile. Please try again',
                ]);
            }
        }else{

        if($status){
            return back()->with('success','Customer profile updated successfully');
        }else{
            alert()->error('Oops! There was an error when trying to updated customer profile. Please try again');
            return back();
        }
    }


    }
}
