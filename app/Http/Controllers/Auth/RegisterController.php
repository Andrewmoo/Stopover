<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\Role;
use App\Guest;
use App\Hotel;

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
            'username'     => 'required|string|max:20|unique:users',
            'email'        => 'required|string|email|max:255|unique:users',
            'password'     => 'required|string|min:6|confirmed',
            'role_id'      => 'numeric|min:1|max:3',
            'email'        => 'required|string|email|max:191',
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
        $user = User::create([
            'name'     => $data['firstName'] . ' ' . $data['lastName'],
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => ($data['role_id'] == '1' ? User::GUEST_TYPE : User::HOTEL_TYPE),
        ]);
        
        if($user['type'] == User::GUEST_TYPE) {
            $user->roles()->attach(Role::where('type', 'guest')->first());
            $user->guest()->create([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'email' => $data['email'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'institution' => $data['institution'],
            ]);
            
        }
        else {
            $user->roles()->attach(Role::where('type', 'hotel')->first());
        }
            
        return $user;
    }

    public function showRegistrationForm()
    {
        session(['link' => url()->previous()]);
        return view('auth.register');
    }
    
    protected function registered(Request $request, $user)
    {
        return redirect(session('link'));
    }
}
