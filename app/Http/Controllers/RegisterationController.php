<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterationController extends Controller
{
    public function index(){
        return view("registeration.sign_up");
    }
    public function store(Request $request){
        $validatedUser = $request->validate([
            "name"=>"required|string|min:2|max:255",
            "email"=>"required|email|unique:users|max:255",
            "password"=>"required|string|min:8|confirmed"
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect("/");
    }
}
