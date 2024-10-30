<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Mail\UserRegisteredMail; // Import the Mailable class
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail; // Import the Mail facade

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
//    protected $redirectTo = '/dashboard';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $role = Role::find($data['role']);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_slug'=> Str::slug($data['name']),
            'password' => Hash::make($data['password']),
        ]);
        if ($role) {
            $user->roles()->attach($role);
        }
        Mail::to($user->email)->send(new UserRegisteredMail($user));
        return $user;
    }


    protected function redirectTo()
    {
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            return route('admin_dashboard');
        } elseif ($user->hasRole('content_creator')) {
            return route('creator_dashboard');
        } elseif ($user->hasRole('general_user')) {
            return route('user_dashboard');
        } else {
            return '/';
        }
    }
}
