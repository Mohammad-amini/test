<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
	public function index(){
		return 'User controller';
	}

	public function createUsers(){
		$users = [];
		for ($i=0; $i < 10; $i++) { 
			$password = '123456';
			$u = ['name' => 'User ' . $i, 'email' => "user$i@localhost.com", 'password' => Hash::make($password)];
			$users[] = $u;
			User::create($u);
		}
		return $users;
	}
}