<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(){
        return view("user.create");
    }

    public function store(Request $request){
        $formFileds = $request->validate([
            "name"=> ["required", "min:3"],
            "email"=> ["required", Rule::unique("users", "email")],
            "password"=> "required|confirmed|min:6"
        ]);

        // $formFileds["password"] = bcrypt($formFileds["password"]);
        $user = User::create($formFileds);
        auth()->login($user);
        return redirect("/")->with("message", "User created and login successfully.");
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with("message", "Log Out successfully.");
    }

    public function login(){
        return view("user.login");
    }

    public function authenticate(Request $request){
        $formFileds = $request->validate([
            "email"=> ["required", "email"],
            "password"=> "required"
        ]);

        if (auth()->attempt($formFileds)) {
            $request->session()->regenerate();
            return redirect("/")->with("message", "You are now logged in.");
        }
        return back()->withErrors(["email"=> "Invalid Credentials."])->onlyInput("email");
    }
}
