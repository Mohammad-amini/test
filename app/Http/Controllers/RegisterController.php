<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
	public function index(){
		return view('register');
	}

    public function register()
    {
        $this->validate(request(), [
            'name' => ['required', 'unique:users', 'min:6'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
            'repassword' => ['required', 'min:6'],
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/');
    }
}