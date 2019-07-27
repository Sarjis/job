<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        if ($data['business_name'] == '') {
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'business_name' => 'applicant',
                'type' => $data['type'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        } else {
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'business_name' => $data['business_name'],
                'type' => $data['type'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }

    }
}
