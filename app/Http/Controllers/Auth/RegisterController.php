<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
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
        
        if($data['role_id'] == '1')
        {
            return Validator::make($data, [
                'username'     => 'required|string|min:3|max:20|unique:users',
                'email'        => 'required|string|email|max:255|unique:users',
                'password'     => 'required|string|min:6|confirmed',
                'role_id'      => [
                    'required', 
                    'numeric',
                    Rule::in(['1']),
                ],
                'email'        => 'required|string|email|max:191',

                'firstName' => 'required|string|max:191',
                'lastName' => 'required|string|max:191',
                'guest_address' => 'required|string|max:191',
                'guest_phone' => 'required|string|max:50',
            ]);
        }
        else{
            return Validator::make($data, [
                'username'     => 'required|string|min:3|max:20|unique:users',
                'email'        => 'required|string|email|max:255|unique:users',
                'password'     => 'required|string|min:6|confirmed',
                'role_id'      => [
                    'required',
                    'numeric',
                    Rule::in(['3']),
                ],
                'email'        => 'required|string|email|max:191',

                'name' => 'required|string|max:191',
                'hotel_address' => 'required|string|max:191',
                'county' => 'required|string|max:50',
                'hotel_phone' => 'required|numeric',
                'eircode' => 'string|min:7|max:7'
            ]);
        }
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
        ]);
        
        if($data['role_id'] == '1') {
            $user->roles()->attach(Role::where('type', 'guest')->first());
            $user->guest()->create([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'email' => $data['email'],
                'address' => $data['guest_address'],
                'phone' => $data['guest_phone'],
            ]);
        }
        else {
            $user->roles()->attach(Role::where('type', 'hotel')->first());
            $user->hotel()->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'address' => $data['hotel_address'],
                'phone' => $data['hotel_phone'],
                'county' => $data['county'],
                'eircode' => $data['eircode']
            ]);
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
