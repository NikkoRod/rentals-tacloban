<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'contact_number' => ['required', 'string', 'size:11'],
    ];

    if (request()->is('register/landlord')) {
        $rules['business_permit'] = ['required', 'file', 'mimes:pdf', 'max:2048'];
    }

    return Validator::make($data, $rules);
}

protected function registered(Request $request, $user)
{
    if ($user->role === 'landlord') {

        return redirect('/');
    }
    if ($user->role === 'tenant') {
        Auth::login($user);
        return redirect('/tenant/dashboard');
    }
    // Other users follow the default redirect path
    return redirect('/login');
}




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Validate the contact number
        $this->validator($data);

        // Check if the user already exists
        if (User::where('email', $data['email'])->exists()) {
            return response()->json(['error' => 'Email already exists'], 409);
        }

        // Create the user
        // Ensure the contact number is 11 digits
        if (strlen($data['contact_number']) !== 11) {
            return response()->json(['error' => 'Contact number must be 11 digits'], 422);
        }
        // Ensure the password is at least 8 characters
        if (strlen($data['password']) < 8) {
            return response()->json(['error' => 'Password must be at least 8 characters'], 422);
        }
        // Ensure the password confirmation matches 
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'contact_number' => $data['contact_number'],
        'role' => 'tenant'
    ]);

    // Automatically login the user after registration
    Auth::login($user);

    return $user;
    }
}
